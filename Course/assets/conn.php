<?php
	try {
		$pdo = new PDO("mysql:host=localhost;dbname=blog;", "root", "");
	}catch(PDOException $ex){
		echo $ex->getMessage();
	}


   function registerUser($email, $password, $name, $avatar='no-ava.jpg', $role='user', $ban='not'){

		global $pdo;
		$queryObj = $pdo->prepare("insert into users(email, password, name, role, avatar, ban) values(:ue, :up, :un, :ur, :ua, :ub)");

		try {
			$queryObj->execute([
				'ue' => $email,
				'up' => md5($password),
				'un' => $name,
				'ur' => $role,
				'ua' => $avatar,
                'ub' => $ban,
			]);
		}catch(PDOException $ex){
			echo $ex->getMessage();
			return false;
		}
		return true;
	}
  

   function loginUser($email, $password){
		global $pdo;
		$queryObj = $pdo->prepare("select * from users where email = :ue and password = :up");

		$queryObj->execute([
			'ue' => $email,
			'up' => md5($password)
		]);

		$user = $queryObj->fetch(PDO::FETCH_ASSOC);
		return $user;
	}

   function getGenres(){
		global $pdo;
		$queryObj = $pdo->query("select * from genre");
		$categories = $queryObj->fetchAll(PDO::FETCH_ASSOC);
		return $categories;
	}
	function addBook($title, $category_id, $user_id, $book='image.pdf', $status='draft'){
		global $pdo;
		$queryObj = $pdo->prepare("insert into books(title, category_id, user_id, status, booking, created_at) values(:ptt, :pci, :pui, :pst, :pim, :pca)");

		date_default_timezone_set('Asia/Almaty');

		try {
			$queryObj->execute([
				'ptt' => $title,
				'pci' => $category_id,
				'pui' => $user_id,
				'pst' => $status,
				'pim' => $book,
				'pca' => date("Y-m-d H:i:s", time()),
			]);
		}catch(PDOException $ex){
			echo $ex->getMessage();
			return false;
		}
		return true;
	}
   function getPosts($catId = null){
		global $pdo;

		if($catId){
			$queryObj = $pdo->prepare("select * from books where category_id = ?");
			$queryObj->execute([$catId]);
		}
		else{
			$queryObj = $pdo->query("select * from books");
		}

		$posts = $queryObj->fetchAll(PDO::FETCH_ASSOC);
		return $posts;
	}
   function getOnePost($postId){
		global $pdo;

		$queryObj = $pdo->prepare("select * from books where id = ?");
		$queryObj->execute([$postId]);


		
		$post = $queryObj->fetch(PDO::FETCH_ASSOC);
		return $post;
	}
   function editPost($id, $title, $category_id, $status='draft', $image='no-img.jpg'){

		global $pdo;
		$queryObj = $pdo->prepare("update books SET title=:ptt, category_id=:pci, status=:pst, image=:pim where id=:pid");

		try {
			$queryObj->execute([
				'pid' => $id,
				'ptt' => $title,
				'pci' => $category_id,
				'pst' => $status,
				'pim' => $image,
			]);
		}catch(PDOException $ex){
			echo $ex->getMessage();
			return false;
		}
		return true;
	}
   function deletePost($postId){
		global $pdo;
		$queryObj = $pdo->prepare("delete from books where id = ?");
		$result = $queryObj->execute([$postId]);
		return $result;
	}
   function searchPosts($search){ 
      global $pdo; 
     
      if($search){ 
       $queryObj = $pdo->prepare("select * from books where title like :search"); 
       $queryObj->execute(['search' => '%'.$search.'%']); 
      } 
      else{ 
       $queryObj = $pdo->query("select * from books"); 
      } 
     
       
      $posts = $queryObj->fetchAll(PDO::FETCH_ASSOC); 
      return $posts; 
     }

     function ratePost($user_id, $post_id, $rating){ 
      global $pdo; 
      $queryObj = $pdo->prepare("select * from user_post where uid=:uid and pid=:pid"); 
     
      try { 
       $queryObj->execute([ 
        'uid' => $user_id, 
        'pid' => $post_id, 
       ]); 
      }catch(PDOException $ex){ 
       echo $ex->getMessage(); 
       return false; 
      } 
     
      $result = $queryObj->fetch(PDO::FETCH_ASSOC); 
     
      if($result){ 
       $queryObj = $pdo->prepare("update user_post SET rating=:rating where uid=:uid and pid=:pid"); 
      } 
      else{ 
       $queryObj = $pdo->prepare("insert into user_post(uid, pid, rating) values(:uid, :pid, :rating)"); 
      } 
     
      try { 
       $queryObj->execute([ 
        'uid' => $user_id, 
        'pid' => $post_id, 
        'rating' => $rating, 
       ]); 
      }catch(PDOException $ex){ 
       echo $ex->getMessage(); 
       return false; 
      } 
      return true; 
     } 
     function readCount($user_id, $post_id, $readed){ 
        global $pdo; 
        $queryObj = $pdo->prepare("select * from `read` where uid=:uid and pid=:pid"); 
       
        try { 
         $queryObj->execute([ 
          'uid' => $user_id, 
          'pid' => $post_id, 
         ]); 
        }catch(PDOException $ex){ 
         echo $ex->getMessage(); 
         return false; 
        } 
       
        $result = $queryObj->fetch(PDO::FETCH_ASSOC); 
       
        if($result){ 
         $queryObj = $pdo->prepare("update `read` SET readed=:readed where uid=:uid and pid=:pid"); 
        } 
        else{ 
         $queryObj = $pdo->prepare("insert into `read`(uid, pid, readed) values(:uid, :pid, :readed)"); 
        } 
       
        try { 
         $queryObj->execute([ 
          'uid' => $user_id, 
          'pid' => $post_id, 
          'readed' => $readed, 
         ]); 
        }catch(PDOException $ex){ 
         echo $ex->getMessage(); 
         return false; 
        } 
        return true; 
       } 
     function getRating($post_id){ 
      global $pdo; 
      $queryObj = $pdo->prepare("select avg(rating) as rating from user_post where pid=:pid"); 
     
      try { 
       $queryObj->execute([ 
        'pid' => $post_id, 
       ]); 
      }catch(PDOException $ex){ 
       echo $ex->getMessage(); 
       return false; 
      } 
      $result = $queryObj->fetch(PDO::FETCH_ASSOC); 
      return $result; 
     }
     function getRead($post_id){ 
        global $pdo; 
        $queryObj = $pdo->prepare("select count(readed) as readed from `read` where pid=:pid"); 
       
        try { 
         $queryObj->execute([ 
          'pid' => $post_id, 
         ]); 
        }catch(PDOException $ex){ 
         echo $ex->getMessage(); 
         return false; 
        } 
        $result = $queryObj->fetch(PDO::FETCH_ASSOC); 
        return $result; 
       }
     // ------------------------------------------------------------------------------------------------
function updatePassword($oldpassword, $newpassword, $id) {
   require_once 'update.php';
   global $pdo;
   $updateQuery = $pdo->prepare("update users set password = :newpass WHERE id = :uid and password = :oldpass");
   try {
       $updateQuery->execute([
           'uid' => $id,
           'oldpass' => md5($oldpassword),
           'newpass' => md5($newpassword)
       ]);
   } catch (PDOException $ex) { 
       return false;
   }
   return true;
}
// ----------------------------------------
function getUsers(){
   global $pdo;
   $queryObj = $pdo->query("select * from users");
   $users = $queryObj->fetchAll(PDO::FETCH_ASSOC);
   return $users;
}
function changeToMod($userId) {
   global $pdo;
   $updateQuery = $pdo->prepare("update users set role = 'author' WHERE id = :uid ");
   try {
       $updateQuery->execute([
           'uid' => $userId,
       ]);
   } catch (PDOException $ex) { 
       return false;
   }
   return true;
}
function ban($userId) {
    global $pdo;
    $updateQuery = $pdo->prepare("update users set ban = 'yes' WHERE id = :uid ");
    try {
        $updateQuery->execute([
            'uid' => $userId,
        ]);
    } catch (PDOException $ex) { 
        return false;
    }
    return true;
 }
 function unban($userId) {
    global $pdo;
    $updateQuery = $pdo->prepare("update users set ban = 'not' WHERE id = :uid ");
    try {
        $updateQuery->execute([
            'uid' => $userId,
        ]);
    } catch (PDOException $ex) { 
        return false;
    }
    return true;
 }
function changeToUser($userId) {
   global $pdo;
   $updateQuery = $pdo->prepare("update users set role = 'user' WHERE id = :uid ");
   try {
       $updateQuery->execute([
           'uid' => $userId,
       ]);
   } catch (PDOException $ex) { 
       return false;
   }
   return true;
}
function publicPost($id){

    global $pdo;
    $queryObj = $pdo->prepare("update books SET status='public' where id = :pid");
 
    try {
       $queryObj->execute([
          'pid' => $id
       ]);
    }catch(PDOException $ex){
       echo $ex->getMessage();
       return false;
    }
    return true;
 }
 
 function addCat($title){

    global $pdo;
    $queryObj = $pdo->prepare("insert into genre(types) values(:ptt)");
    try {
        $queryObj->execute([
            'ptt' => $title
        ]);
    }catch(PDOException $ex){
        echo $ex->getMessage();
        return false;
    }
    return true;
}
function delCat($cat_id){
    global $pdo;
    $queryObj = $pdo->prepare("delete from genre where id = ?");
    $result = $queryObj->execute([$cat_id]);
    return $result;
}
?>
