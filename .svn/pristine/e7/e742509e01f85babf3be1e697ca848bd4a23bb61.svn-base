<?php 
namespace Admin\Model;
use Think\Model;
class UserModel extends Model {
  public function index(){
    echo "12456789";
  }

  public function sqls(){
    $model=M();
    // $sql='delete from user where name=123';
    $sql='select * from user';
    // execute输出的是影响行数
    // query输出的是数据集合
    dump($model->execute($sql));
    var_dump($model->query($sql));
  }
}
?>