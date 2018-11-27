<?php
class db
{ 
	private $db;
	private $error;
	function __construct($DB_con)
	{
	  $this->db = $DB_con;
	}

	public function insertPDO($name,$email,$date,$no_hp,$image, $password,$address)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO registration (name, email, date, no_hp, image, password, address)
			VALUES (:name, :email, :date, :no_hp, :image, :password, :address)");
				 $stmt->bindparam(":name",$name);
				 $stmt->bindparam(":email",$email);
				 $stmt->bindparam(":date",$date);
                 $stmt->bindparam(":no_hp",$no_hp);
                 $stmt->bindparam(":image",$image);
                 $stmt->bindparam(":password",$password);
                 $stmt->bindparam(":address",$address);
                 
					 $stmt->execute();
			return true;
		}
		catch(PDOException $e)
			{
				echo $e->getMessage(); 
				return false;
			}
	}


	public function getUser($email){

		try{
		
		$statement = $this->db->prepare("SELECT * FROM registration WHERE email=:email");
		$statement->execute(array(":email"=>$email));
		$dataRows = $statement->fetch(PDO::FETCH_ASSOC);
		
		return $dataRows;
		
		} catch (PDOException $ex){
		echo $ex->getMessage();
		}
	}

	
	public function login($email, $password) 

	{ 

		try 

		{ 

			// Ambil data dari database 

			$stmt = $this->db->prepare("SELECT * FROM registration WHERE email = :email"); 

			$stmt->bindParam(":email", $email); 

			$stmt->execute(); 

			$data = $stmt->fetch(); 

			// Jika jumlah baris > 0 

			if($stmt->rowCount() > 0){ 

				// jika password yang dimasukkan sesuai dengan yg ada di database 

				if(password_verify($password, $data['password'])){ 

					$_SESSION['user_session'] = $data['name']; 

					return true; 

				}else{ 

					$this->error = "Email atau Password Salah"; 

					return false; 

				} 

			}else{ 

				$this->error = "Email atau Password Salah"; 

				return false; 

			} 

		} catch (PDOException $e) { 

			echo $e->getMessage(); 

			return false; 

		} 

	} 

	### End : fungsi login user ### 

	### Start : fungsi cek login user ###  

	public function isLoggedIn(){ 

		// Apakah user_session sudah ada di session 

		if(isset($_SESSION['user_session'])) 

		{ 

			return true; 

		} 

	} 

	### End : fungsi cek login user ###  

	### Start : fungsi ambil data user yang sudah login ###   

	// public function getUser(){ 

	// 	// Cek apakah sudah login 

	// 	if(!$this->isLoggedIn()){ 

	// 		return false; 

	// 	} 

	// 	try { 

	// 		// Ambil data user dari database 

	// 		$stmt = $this->db->prepare("SELECT * FROM registration WHERE name = :name"); 

	// 		$stmt->bindParam(":name", $_SESSION['user_session']); 

	// 		$stmt->execute(); 

	// 		return $stmt->fetch(); 

	// 	} catch (PDOException $e) { 

	// 		echo $e->getMessage(); 

	// 		return false; 

	// 	} 

	// } 

	### End : fungsi ambil data user yang sudah login ###  

	### Start : fungsi Logout user ###  

	// public function logout(){ 

	// 	// Hapus session 

	// 	session_destroy(); 

	// 	// Hapus user_session 

	// 	unset($_SESSION['user_session']); 

	// 	return true; 

	// } 


	public function getLastError(){ 

		return $this->error; 

	} 

	
 	public function update($id,$firstname,$middlename,$lastname,$email)
	{
		try
		{
			$stmt=$this->db->prepare("UPDATE persons SET firstname=:firstname,middlename=:middlename,lastname=:lastname,email=:email WHERE person_id=:id ");
			$stmt->bindparam(":firstname",$firstname);
			$stmt->bindparam(":middlename",$middlename);
			$stmt->bindparam(":lastname",$lastname);
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":id",$id);
			$stmt->execute();

			return true; 
		}
		catch(PDOException $e)
		{
			echo $e->getMessage(); 
			return false;
		}
	}
	 

	public function delete($id)
	{
		$stmt = $this->db->prepare("UPDATE persons SET status = 0 WHERE person_id=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}
	 
	 /* paging */
	 


	public function dataview($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
			?>
			            <tr>
			            <td><?php print($row['firstname']); ?></td>
			            <td><?php print($row['middlename']); ?></td>
			            <td><?php print($row['lastname']); ?></td>
			            <td><?php print($row['email']); ?></td>
			            <td align="center">
			            <a href="update.php?edit_id=<?php print(password_hash($row['person_id'],PASSWORD_DEFAULT).';'.$row['person_id'].';'.password_hash('generatedpassword',PASSWORD_DEFAULT)); ?>"><i class="glyphicon glyphicon-edit"></i></a>
			            </td>
			            <td align="center">
			            <a href="delete.php?delete_id=<?php print(password_hash($row['person_id'],PASSWORD_DEFAULT).';'.$row['person_id'].';'.password_hash('generatedpassword',PASSWORD_DEFAULT)); ?>"><i class="glyphicon glyphicon-remove-circle"></i></a>
			            </td>
			            </tr>
			            <?php
			}
		}
		else
		{
		?>
		        <tr>
		        <td>Nothing here...</td>
		        </tr>
		        <?php
		}

	}
	 


	
	 
	 
	 
	 /* paging */
	 


}


?>
