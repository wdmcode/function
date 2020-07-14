/**
 * deleteDir 递归删除目录
 * 
 * @Param $dir 
 * @Access public
 * @Return void
 */
function deleteDir($dir , $clearDir = true)
{
    if (rmdir($dir)==false && is_dir($dir)) {
        if ($dp = opendir($dir)) {
            while (($file=readdir($dp)) != false) {
                $path = "$dir/$file";
                if (is_dir($path) && $file!='.' && $file!='..') {
                    deleteDir($path , $clearDir);
                } else {
                    if(!is_dir($path)) unlink($path);
                }
            }
            closedir($dp);
            if($clearDir) rmdir($dir);
        } else {
            return false;
        }
    } 
}
