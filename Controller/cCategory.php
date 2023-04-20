<?php
    include_once("Model/mCategory.php");

    class controlCategory{
        function getAllCategory() {
            $Category = new modelCategory();
            $tblCategory = $Category ->selectAllCategory();
            return $tblCategory;
        }

        function viewAllCategory() {
            $Category = new modelCategory();
            $tblCategory = $Category ->selectAllCategory();
            return $tblCategory;
        }
    }
?>