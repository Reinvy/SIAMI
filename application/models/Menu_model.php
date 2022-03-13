<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `ami_user_sub_menu`.*,`ami_user_menu`.`menu`
        FROM `ami_user_sub_menu` JOIN `ami_user_menu`
        ON `ami_user_sub_menu`.`menu_id` = `ami_user_menu`.`id`
        ";

        return $this->db->query($query)->result_array();
    }
}
