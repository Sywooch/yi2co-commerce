<?php

namespace common\components;

use Yii;
use yii\web\Controller;

class YiishopController extends Controller
{
	public function init()
	{
		if(!isset(Yii::$app->session['cart_code'])) {
			Yii::$app->session['cart_code'] = $this -> getUniqueCode();
		}
	}

    public function randomCode() {

        $RANDCODE = "abcdefghijkmnopqrstuvwxyz023456789";

        srand((double) microtime() * 1000000);
        $i = 0;
        $generateCode = '';
        while ($i <= 7) {
            $num = rand() % 34;
            $tmp = substr($RANDCODE, $num, 1);
            $generateCode = $generateCode . $tmp;
            $i++;
        }
        return strtoupper($generateCode);
    }

    public function rerandomCode() {

        $RANDCODE = "023456789abcdefghijkmnopqrstuvwxyz";

        srand((double) microtime() * 1000000);
        $i = 0;
        $generateCode = '';
        while ($i <= 7) {
            $num = rand() % 34;
            $tmp = substr($RANDCODE, $num, 1);
            $generateCode = $generateCode . $tmp;
            $i++;
        }
        return strtoupper($generateCode);
    }

    public function orderCode() {
        $RANDCODE = "023456789";
        srand((double) microtime() * 1000000);
        $i = 0;
        $generateCode = '';
        while ($i <= 5) {
            $num = rand() % 5;
            $tmp = substr($RANDCODE, $num, 1);
            $generateCode = $generateCode . $tmp;
            $i++;
        }
        return strtoupper($generateCode);
    }

    public function getUniqueCode() {
        return $this->randomCode() . '-' . $this->rerandomCode();
    }
}