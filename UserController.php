<?php
require_once('User.php');
class UserController
{
private $user;
public function __construct(){
    $this->user = new User();
}
public function handleRequest()
{
header("content-type: application/json");
$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        if(isset($_GET['id'])){
            echo json_encode($this->user->get_user_by_id($_GET['id']));
        }else{
            echo json_encode($this->user->get_all_users());
        }
        break;
        case 'POST':
            $data = json_decode(file_get_contents("php://input" ),true);
            if(isset($data["username"] ,$data["password"])){
                $this->user->create_user($data["username"],$data["password"]);
                echo json_encode(["massage" => "کاربر با موفقیت ساخته شد"]);
            }else{
                echo json_encode(["massage"=>"تمام اطلاعات لازم را ارسال کنید"]);
            }
            break;
            case 'PUT':
                $data = json_decode(file_get_contents("php://input" ),true);
                if(isset($_GET["id"] ,$data["username"] ,$data["password"])){
                    $this->user->update_user($_GET["id"] ,$data["username"],$data["password"]);
                    echo  json_encode(["massage" => "کاربر با موفقیت به روز شد"]);

                }else{
                    echo json_encode(["massage" =>"شناسه کاربر و اطلاعات جدید را ارسال کنید"]);
                }
                break;
                case 'DELETE':
                    if(isset($_GET["id"])){
                        $this->user->delete_user($_GET["id"]);
                        echo json_encode(["massage" => "کاربر با موفقیت حذف شد"]);

                    }else{
                        echo json_encode(["massage" => "شناسه کاربر مورد نیاز است"]);
                    }
                    break;
                    default:
                        echo  json_encode(["massage" =>"متد نامعتبر است"]);
}
}
}