<?php

class Helper
{
    private static $url_controller;
    private static $url_action;

    
    /**
     * debugPDO
     *
     * Shows the emulated SQL query in a PDO statement. What it does is just extremely simple, but powerful:
     * It combines the raw query and the placeholders. For sure not really perfect (as PDO is more complex than just
     * combining raw query and arguments), but it does the job.
     * 
     * @author Panique
     * @param string $raw_sql
     * @param array $parameters
     * @return string
     */
    static public function debugPDO($raw_sql, $parameters) {

        $keys = array();
        $values = $parameters;

        foreach ($parameters as $key => $value) {

            // check if named parameters (':param') or anonymous parameters ('?') are used
            if (is_string($key)) {
                $keys[] = '/' . $key . '/';
            } else {
                $keys[] = '/[?]/';
            }

            // bring parameter into human-readable format
            if (is_string($value)) {
                $values[$key] = "'" . $value . "'";
            } elseif (is_array($value)) {
                $values[$key] = implode(',', $value);
            } elseif (is_null($value)) {
                $values[$key] = 'NULL';
            }
        }

        /*
        echo "<br> [DEBUG] Keys:<pre>";
        print_r($keys);
        
        echo "\n[DEBUG] Values: ";
        print_r($values);
        echo "</pre>";
        */
        
        $raw_sql = preg_replace($keys, $values, $raw_sql, 1, $count);

        return $raw_sql;
    }
    // http://www.phpdevtips.com/2013/05/simple-session-based-flash-messages/
    /**
     * Function to create and display error and success messages
     * @access public
     * @param string session name
     * @param string message
     * @param string display class
     * @return string message
     */
    public static function flash( $name = '', $message = '', $class = 'success' )
    {
        //We can only do something if the name isn't empty
        if( !empty( $name ) )
        {
            if( $name=='error' ){
                $class = 'danger';
            }
            //No message, create it
            if( !empty( $message ) && empty( $_SESSION[$name] ) )
            {
                if( !empty( $_SESSION[$name] ) )
                {
                    unset( $_SESSION[$name] );
                }
                if( !empty( $_SESSION[$name.'_class'] ) )
                {
                    unset( $_SESSION[$name.'_class'] );
                }

                $_SESSION[$name] = $message;
                $_SESSION[$name.'_class'] = $class;
            }
            //Message exists, display it
            elseif( !empty( $_SESSION[$name] ) && empty( $message ) )
            {
                $class = !empty( $_SESSION[$name.'_class'] ) ? $_SESSION[$name.'_class'] : 'success';
                echo '<div class="alert alert-'.$class.' alert-dismissable">';
                echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                echo $_SESSION[$name];
                echo '</div>';
                unset($_SESSION[$name]);
                unset($_SESSION[$name.'_class']);
            }
        }
    }
    private static function splitUrl()
    {
        if (isset($_GET['url'])) {

            // split URL
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            // Put URL parts into according properties
            // By the way, the syntax here is just a short form of if/else, called "Ternary Operators"
            // @see http://davidwalsh.name/php-shorthand-if-else-ternary-operators
            self::$url_controller = isset($url[0]) ? $url[0] : null;
            self::$url_action = isset($url[1]) ? $url[1] : null;

        }
    }

    public static function getCurrentClass(){
        self::splitUrl();
        return self::$url_controller;
    }

    public static function getCurrentMethod(){
        self::splitUrl();
        return self::$url_action;
    }

}