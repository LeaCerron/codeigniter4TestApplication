<?php namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'ID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['Name', 'Email','Password','Role'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [
        'Email'        => 'is_unique[users.Email]'];
    protected $validationMessages = [
            'Email'        => [
                'is_unique' => 'An Account with this email already exists. '
            ]
        ];

    protected $skipValidation     = false;

}