<?php

namespace App\Models;

use CodeIgniter\Model;

require('adodb5/adodb.inc.php');

class Course_model extends Model
{

    protected $driver;
    protected $connect_postgresdb;
    protected $server;
    protected $user;
    protected $password;
    protected $database;

    public function __construct()
    {
        $this->driver = 'postgres'; //ประเภทของระบบฐานข้อมูล
        $this->connect_postgresdb = NewADOConnection($this->driver);
        $this->server = 'ec2-52-86-73-86.compute-1.amazonaws.com'; //ชื่อ server
        $this->user = 'epjiinsxvgasmv'; //ชื่อ user
        $this->password = 'da800c8e1dfc3cb9e10a6d4095f8e080099ecd208a243b05ed736d1c8141d0ea'; //รหัสผ่านของ server
        $this->database = 'ddaq8blnai659i'; //ชื่อ database
        $this->connect_postgresdb->debug = false;
        $this->connect_postgresdb->connect($this->server, $this->user, $this->password, $this->database);
    }
    public function Select_Video()
    {
        $sql = "SELECT video_id,video_name,video_link from video";
        return $this->connect_postgresdb->execute($sql);
    }
    public function Upload_Video($title, $file_random)
    {
        //echo $user_first_name;
        $sql = "INSERT INTO video (video_name,video_link) VALUES('$title','$file_random')";
        $this->connect_postgresdb->execute($sql); //จะทำการ Insert ข้อมูลเข้า ฐานข้อมูล
    }
}
