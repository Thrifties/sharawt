<?php 
    namespace App\Models;

    use CodeIgniter\Model;

    class PostsModel extends Model {
        protected $table = 'tbl_posts';
        protected $primaryKey = 'id';
        protected $allowedFields = ['author','headline', 'description'];
        protected $returnType = 'object';
        
    }
?>