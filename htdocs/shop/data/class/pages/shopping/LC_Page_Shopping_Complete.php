<?php
/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) 2000-2013 LOCKON CO.,LTD. All Rights Reserved.
 *
 * http://www.lockon.co.jp/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

require_once CLASS_EX_REALDIR . 'page_extends/LC_Page_Ex.php';

/**
 * ご注文完了 のページクラス.
 *
 * @package Page
 * @author LOCKON CO.,LTD.
 * @version $Id:LC_Page_Shopping_Complete.php 15532 2007-08-31 14:39:46Z nanasess $
 */
class LC_Page_Shopping_Complete extends LC_Page_Ex
{
    /**
     * Page を初期化する.
     *
     * @return void
     */
    public function init()
    {
        parent::init();
        $this->tpl_title = 'Order 【Completed】';
    }

    /**
     * Page のプロセス.
     *
     * @return void
     */
    public function process()
    {
        parent::process();
        $this->action();
        $this->sendResponse();

// update for eSIM
                    // $_SESSION['order_id'] = 1;
        if($_SESSION['order_id']) {
          $sql = "
            SELECT
              product_id,
              name,
              maker_id,
              del_flg
            FROM
              dtb_products
            WHERE
              product_id = (SELECT product_id FROM dtb_order_detail WHERE order_id = ".$_SESSION['order_id']." LIMIT 1)
            AND
              del_flg = 0
          ";

          $objQuery =& SC_Query_Ex::getSingletonInstance();
          $arrRes = $objQuery->getAll($sql);
          // print_r($arrRes[0]['maker_id']);

          if($arrRes[0]['maker_id'] == MAKER_ID_ESIM) {
            //eSIMの購入時のみ実行
            $sql = "
              SELECT
                id,
                order_id,
                product_code,
                iccid,
                url,
                smdp_addr,
                activation_code,
                download_link,
                qr_code,
                del_flg
              FROM
                dtb_esim_stock
              WHERE
                product_code = (SELECT product_code FROM dtb_order_detail WHERE order_id = ".$_SESSION['order_id'].")
              AND
                del_flg = 0
              AND
                order_id is null
              ORDER BY
                id ASC
            ";

            $objQuery =& SC_Query_Ex::getSingletonInstance();
            $arrRes = $objQuery->getAll($sql);

            if(count($arrRes) > 0) {
  // echo "<pre>";
  // print_r($_SESSION['order_id']);
  // print_r($arrRes[0]['id']);
  // echo "</pre>"; exit;

              $objQuery =& SC_Query_Ex::getSingletonInstance();
              $objQuery->begin();

              $errFlag = false;
              //eSIMテーブルに受注IDを更新
              $objQuery->update('dtb_esim_stock', array('order_id' => $_SESSION['order_id']), 'id = ?', array($arrRes[0]['id']));
              // $objQuery->update('dtb_esim_stock', array('order_id' => 1), 'id = ?', array($arrRes[0]['id']));
              //商品在庫を更新
              $objQuery->update('dtb_products_class', array('stock' => count($arrRes) - 1), 'product_code = ?', array($arrRes[0]['product_code']));

              // if ($errFlag) {
              //   $objQuery->rollback();
              //   return;
              // }
              $objQuery->commit();

              //Confirm時に実行するとまだeSIMの情報を持っていないのでこちらで実行するが、
              //決済プラグイン利用時には重複送信になるので削除する
              SC_Helper_Purchase_Ex::sendOrderMail($_SESSION['order_id']);

            } else {
              //在庫切れの処理
            }

          }

        }
// update for eSIM


        // プラグインなどで order_id を取得する場合があるため,  ここで unset する
        unset($_SESSION['order_id']);
        setcookie('start_date', '', time() - 864000, '/');
        setcookie('end_date', '', time() - 864000, '/');
        setcookie('rental_term', '', time() - 864000, '/');
        setcookie('delivery_date', '', time() - 864000, '/');
        setcookie('delivery_time', '', time() - 864000, '/');
        setcookie('rental_flg', '', time() - 864000, '/');
        setcookie('suitcase_flg', '', time() - 864000, '/');
        setcookie('sale_flg', '', time() - 864000, '/');
        setcookie('extension_flg', '', time() - 864000, '/');
        setcookie('receive_flg', '', time() - 864000, '/');
        setcookie('receive_flg_tmp', '', time() - 864000, '/');
    }

    /**
     * Page のアクション.
     *
     * @return void
     */
    public function action()
    {
        $this->arrInfo = SC_Helper_DB_Ex::sfGetBasisData();
    }

    /**
     * 決済モジュールから遷移する場合があるため, トークンチェックしない.
     */
    public function doValidToken()
    {
        // nothing.
    }
}
