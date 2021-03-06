<?php
// autoload classes as needed
namespace Application\Autoload;
class Loader
{
    const UNABLE_TO_LOAD = 'Unable to load class';
    
    // array of directories
    protected static $dirs = array();
    protected static $registered = 0;
    
    //Option 1: to initiate
    public function __construct(array $dirs = array())
    {
        self::init($dirs);
    }
    
    //Option 2: to initiate
    /**
     * Adds a directory to the list of supported directories
     * Also registers "autoload" as an autoloading method
     * 
     * @param array | string $dirs
     */
    public static function init($dirs = array())
    {
        if ($dirs) {
            self::addDirs($dirs);
        }
        if (self::$registered == 0) {
            spl_autoload_register(__CLASS__ . '::autoload');
            //OR: spl_autoload_register('self::autoLoad');
            self::$registered++;
        }
    }
    
    public static function addDirs($dirs)
    {
        if (is_array($dirs)) {
            self::$dirs = array_merge(self::$dirs, $dirs);
        } else {
            self::$dirs[] = $dirs;
        }
    }
        
    /**
    * locate the file based on the namespaced class
    */
    public static function autoLoad($class)
    {
        //be default, assume the loading is unsuccessful
        $success = FALSE;
        
        //derives a filename by converting the PHP namespace separator \ into the directory separator 
        //appropriate for this server and appending .php
        $fn = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
        
        foreach (self::$dirs as $start) {
            $file = $start . DIRECTORY_SEPARATOR . $fn;
            //check if the file is existing, if yes, require it
            if (self::loadFile($file)) {
                $success = TRUE;
                break;
            }
        }
        
        //If the above loop is not successful, as a last resort, the method attempts to load the file from the current directory. 
        //If even that is not successful, an Exception is thrown
        if (!$success) {
            if (!self::loadFile(__DIR__ . DIRECTORY_SEPARATOR . $fn)) {
                throw new \Exception(self::UNABLE_TO_LOAD . ' ' . $class);
            }
        }
        
        return $success;
    }
    
    /**
    * if the desired file is existing, get it required or return the false
    */
    protected static function loadFile($file)
    {
        if (file_exists($file)) {
            require_once $file;
            return TRUE;
        }
        return FALSE;
    }
}