<? 
require_once('__system.php');
if(isset($_POST['id']))
{
	$id = $_POST['id'];?>
	<div id="moduleRequirement">
		<select id="moduleRequirementAssociated"><?
			$k = "select idR from Requisiti where idR not in ( select idR from PackageRequirement where idP = '$id')";
			$q = mysqli_query(connect(),$k) or die("MODUPDATE : (package)".$k);
			while($v = $q->fetch_array())
			{?>
				<option value="<?echo $v[0];?>"><?echo $v[0];?></option><?
			}?>
		</select>
		<button id="moduleRequirementInsert" class="actionInsert">+</button>
		<table><?
			$k = "select idR from PackageRequirement where idP = '$id'";
			$q = mysqli_query(connect(),$k) or die("MODUPDATE : (package)".$k);
			while($v = $q->fetch_array())
			{?>
				<tr class="<?echo $v[0];?>">
					<td><button class="moduleRequirementDelete actionDelete">-</button>
					<td><?echo $v[0];?></td>
				</tr><?
			}?>
		</table>
	</div><?
}