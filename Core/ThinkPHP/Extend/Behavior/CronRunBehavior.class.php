<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2009 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

defined('THINK_PATH') or exit();
/**
 * 自动执行任务
 * @category   Extend
 * @package  Extend
 * @subpackage  Behavior
 * @author   liu21st <liu21st@gmail.com>
 */

/**
 * 首先是在Config目录下定义任务配置文件crons.php
 *     return array(
 *        'cronname'=>array('filename',intervals,nextruntime),...
 *     );
 * cronname是任务名称，主要是日志记录使用，好知道执行了哪些任务
 * filename是脚本文件名，全部放在Lib/Cron/下面
 * intervals是任务执行间隔时间,UNIX时间戳类型
 * nextruntime是第一次或下一次执行时间 UNIX时间戳类型
 * 
 * 最后在 Config目录下 tags.php 文件内配置 'app_begin'=>array('CronRun') 开启计划
 * 
 * 另外，在主配置文件里面还可以定义CRON_MAX_TIME，这个选项理解为任务执行间隔的最短时间比较好， * 主要是防止任务延期激活导致和下一次执行时间重叠
 * 
 */

class CronRunBehavior extends Behavior {
    protected $options   =  array(
            'CRON_MAX_TIME' =>  60, // 单个任务最大执行时间
        );
    public function run(&$params) {
        // 锁定自动执行
        $lockfile	 =	 RUNTIME_PATH.'cron.lock';
        if(is_writable($lockfile) && filemtime($lockfile) > $_SERVER['REQUEST_TIME'] - C('CRON_MAX_TIME')) {
            return ;
        } else {
            touch($lockfile);
        }
        set_time_limit(1000);
        ignore_user_abort(true);

        // 载入cron配置文件
        // 格式 return array(
        // 'cronname'=>array('filename',intervals,nextruntime),...
        // );
        if(is_file(RUNTIME_PATH.'~crons.php')) {
            $crons	=	include RUNTIME_PATH.'~crons.php';
        }elseif(is_file(CONF_PATH.'crons.php')){
            $crons	=	include CONF_PATH.'crons.php';
        }
        if(isset($crons) && is_array($crons)) {
            $update	 =	 false;
            $log	=	array();
            foreach ($crons as $key=>$cron){
                if(empty($cron[2]) || $_SERVER['REQUEST_TIME']>=$cron[2]) {
                    // 到达时间 执行cron文件
                    G('cronStart');
                    include LIB_PATH.'Cron/'.$cron[0].'.php';
                    $_useTime	 =	 G('cronStart','cronEnd', 6);
                    // 更新cron记录
                    $cron[2]	=	$_SERVER['REQUEST_TIME']+$cron[1];
                    $crons[$key]	=	$cron;
                    $log[] = "Cron:$key Runat ".date('Y-m-d H:i:s')." Use $_useTime s\n";
                    $update	 =	 true;
                }
            }
            if($update) {
                // 记录Cron执行日志
                Log::write(implode('',$log));
                // 更新cron文件
                $content  = "<?php\nreturn ".var_export($crons,true).";\n?>";
                file_put_contents(RUNTIME_PATH.'~crons.php',$content);
            }
        }
        // 解除锁定
        unlink($lockfile);
        return ;
    }
}