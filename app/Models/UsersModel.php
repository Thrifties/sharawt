<?php 
    namespace App\Models;

    use CodeIgniter\Model;

    class UsersModel extends Model {
        protected $table = 'tbl_users';
        protected $primaryKey = 'id';
        protected $allowedFields = ['nickname', 'pass', 'email'];
        protected $returnType = 'object';
        
    }
?>