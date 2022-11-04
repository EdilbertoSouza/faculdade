<?php

class FormatService
{
    public function __construct($param)
    {
        
    }
    
    public static function dataBr($dataDefault)
    {
        if($dataDefault)
        {
            try
            {
                $date = new DateTime($dataDefault);
                return $date->format('d/m/Y');
            }
            catch (Exception $e)
            {
                return $dataDefault;
            }
        }
        return $dataDefault;
    }
    
    public static function valorBr($valueDefault)
    {
        if(is_numeric($valueDefault))
        {
            return "R$ " . number_format($valueDefault, 2, ",", ".");
        }
        else
        {
            return $valueDefault;
        }

        return $valueDefault;
    }
    
    public static function mask($value, $mask) {
      $maskared = '';
      $k = 0;
      for($i = 0; $i<=strlen($mask)-1; $i++) {
          if($mask[$i] == '#') {
              if(isset($value[$k])) $maskared .= $value[$k++];
          } else {
              if(isset($mask[$i])) $maskared .= $mask[$i];
          }
      }
      return $maskared;
    }

    public static function number($value) {
        if (is_numeric($value)) {
            return number_format($value, 2, ',', '.');
        }
        return $value;
    }
     
}
