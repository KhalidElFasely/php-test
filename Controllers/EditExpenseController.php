
<?php
require_once("../Models/db_connect.php");

class EditExpenseController {
    public function showEditForm() {
        try {
            if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
                throw new Exception("Invalid id parameter");
            }
            $id = (int)$_GET["id"];
            
            $expense = getDetailExpense($id);
            if (!$expense) {
                throw new Exception("Expense not found");
            }
            
            // Load the view
            require_once("../Views/edit.php");
            
        } catch (Throwable $th) {
            echo "Error: " . $th->getMessage();
            exit;
        }
    }

    public function handleEdit() {
        try {
            if (!isset($_POST["id"]) || !is_numeric($_POST["id"])) {
                throw new Exception("Invalid id parameter");
            }
            $id = (int)$_POST["id"];
            $title = $_POST["title"];
            $note = $_POST["note"];
            $date = $_POST["date"];
            $price = $_POST["price"];

            if (!is_numeric($price)) {
                throw new Exception("Invalid price value");
            }

            updateExpense($id, $title, $note, $date, $price);

            header('location:../index.php');
            exit;

        } catch (Throwable $th) {
            echo "Error: " . $th->getMessage();
        }
    }
}
?>