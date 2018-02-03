<?php
require_once 'ca4nafa3ga.php';

if (isset($_POST['elect'])) {
	$id = $_POST['id'];
	$pg = $_POST['pg'];
	$sql = "SELECT * FROM vxxz_elections WHERE election_type = '$pg'";
	$sqlx = "SELECT * FROM vxxz_candidates WHERE candidates_election = '$pg'";
	$query = $conn->query($sql);
	if ($query->num_rows==0) {
		echo "error1";
	}else{
		if ($pg=="State") {
		?>
		<h4>Select a state</h4><br>
		<select id="selectState" style="padding: 10px; border: none; border-radius: 3px; cursor: pointer;" onchange="selectState(this.value)">
			<option value="Lagos">Lagos</option>
			<option value="Edo">Edo</option>
			<option value="Ogun">Ogun</option>
			<option value="Ondo">Ondo</option>
			<option value="Akwa-Ibom">Akwa-Ibom</option>
			<option value="Delta">Delta</option>
			<option value="Rivers">Rivers</option>
			<option value="Oyo">Oyo</option>
		</select>
		<br><br>
		<?php
		}else{
			while ($log = $query->fetch_assoc()) {
			$queryx = $conn->query($sqlx);
			if ($queryx->num_rows==0) {
				echo "error2";
			}else{
			while ($logx = $queryx->fetch_assoc()) {
			?>
			<div class="portlet-grid-page">
				<div class="portlet-grid panel-primary"> 
				    <div class="panel-heading">
				    	<h3 class="panel-title"><?=$logx['candidates_name']; ?></h3>
				    </div> 
				    <div class="panel-body">
				    	<div style="text-align: center;">
				    		<img src="images/4.png" width="100px">
				    	</div>
				    	<p>Party: <?=$logx['candidates_party'] ?></p>
				    	<!-- <p>Alias Name: Say Baba</p> -->
				    	<!-- <p>Age: 67years</p> -->
				    	<p>Prospective Tenure: <?=$logx['candidates_tenure']; ?></p>
				    	<?php
				    	$sqlv = "SELECT * FROM vxxz_vote_count WHERE vote_count_voter = '$id' and vote_count_election = '$pg' and vote_count_id = '".$log['election_id']."'";
						$queryv = $conn->query($sqlv);
						$logv = $queryv->fetch_assoc();
				    	if ($logv['vote_count_voter']) {
				    	?>
				    	<button class="btn btn-danger" disabled="">You have already voted!</button>
				    	<?php
				    	}else{
				    	?>
				    	<button class="btn btn-success btnVote" value="<?=$logx['candidates_id']; ?>" vrid="<?=$pg; ?>" vvid="<?=$log['election_id'];?>" onclick="votenow(this)">Vote</button>
				    	<?php
				    	}
				    	?>
				    </div> 
				</div>  
			</div>
			<?php
			}
			}
			}
		}
	}
}

if (isset($_POST['voted'])) {
	$id = $_POST['id'];
	$viod = $_POST['viod'];
	$vrid = $_POST['vrid'];
	$vvid = $_POST['vvid'];
	$dt = time();

	$sql = "INSERT INTO vxxz_vote_count (vote_count_id, vote_count_candidate, vote_count_election, vote_count_voter, vote_count_date) VALUES ('$vvid', '$viod', '$vrid', '$id', '$dt')";
	if ($conn->query($sql)) {
		echo "success";
	}else{
		echo "error1";
	}
}

if (isset($_POST['statenow'])) {
	$id = $_POST['id'];
	$ssl = $_POST['ssl'];

	$sql = "SELECT * FROM vxxz_elections WHERE election_location = '$ssl' and election_type = 'State'";
	$query = $conn->query($sql);
	if ($query->num_rows==0) {
		echo "error1";
	}else{
		 $sqlx = "SELECT * FROM vxxz_candidates WHERE candidates_election = 'State' and candidates_location = '$ssl'";
			$queryx = $conn->query($sqlx);
			if ($queryx->num_rows==0) {
				echo "error2";
			}else{
		while ($logx = $queryx->fetch_assoc()) {
			
				$log = array();
				$log = $query->fetch_assoc();
			?>
			<div class="portlet-grid-page">
				<div class="portlet-grid panel-primary"> 
				    <div class="panel-heading">
				    	<h3 class="panel-title"><?=$logx['candidates_name']; ?></h3>
				    </div> 
				    <div class="panel-body">
				    	<div style="text-align: center;">
				    		<img src="images/4.png" width="100px">
				    	</div>
				    	<p>Party: <?=$logx['candidates_party'] ?></p>
				    	<!-- <p>Alias Name: Say Baba</p> -->
				    	<!-- <p>Age: 67years</p> -->
				    	<p>Prospective Tenure: <?=$logx['candidates_tenure']; ?></p>
				    	<?php
				    	$sqlv = "SELECT * FROM vxxz_vote_count WHERE vote_count_voter = '$id' and vote_count_election = 'State' and vote_count_id = '".$log['election_id']."'";
						$queryv = $conn->query($sqlv);
						$logv = $queryv->fetch_assoc();
				    	if ($logv['vote_count_voter']) {
				    	?>
				    	<button class="btn btn-danger" disabled="">You have already voted!</button>
				    	<?php
				    	}else{
				    	?>
				    	<button class="btn btn-success btnVote" value="<?=$logx['candidates_id']; ?>" vrid="State" vvid="<?=$log['election_id'];?>" onclick="votenow(this)">Vote</button>
				    	<?php
				    	}
				    	?>
				    </div> 
				</div>  
			</div>
			<?php
			}
		}
	}
}
?>