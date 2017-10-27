<form>
  <div class="form-row align-items-center">
    <div class="col-auto">
      <label class="sr-only" for="colorName">Color Name</label>
      <input type="text" class="form-control mb-2 mb-sm-0" id="colorName" name="colorName" placeholder="Merpy Blue">
    </div>
    <div class="col-auto">
      <label class="sr-only" for="hexCode">Hex Code</label>
      <div class="input-group mb-2 mb-sm-0">
        <div class="input-group-addon">#</div>
        <input type="text" maxlength="6" class="form-control" id="hexCode" name="hexCode" placeholder="4286F4">
      </div>
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-secondary">Add Color</button>
    </div>
  </div>
</form>

<?php

	// Common Functions...
	include_once('database.php');

	// Check for input and add color if necessary
	if(isset($_GET['colorName']) && isset($_GET['hexCode'])) {
		// Clean input variables
		$safeName = htmlentities($_GET['colorName']);
		$safeHex = htmlentities($_GET['hexCode']);
		
		// Insert them
		addColor($safeName, $safeHex);
	}

	if (isset($_GET['removeColor'])) {
		$safeColor = htmlentities($_GET['removeColor']);

		deleteColor($safeColor);
	}

	// Color Functions...
	function getColors() {
		// Return list of all saved colors
		$sql = "SELECT * FROM colors ORDER BY id desc;";
		$request = pg_query(getDb(), $sql);
		return pg_fetch_all($request);
	}

	function addColor($name, $hex) {
		// Insert a new color into database
		$sql = "INSERT INTO colors (name, hex) VALUES ('" . $name . "', '" . $hex . "');";
		$request = pg_query(getDb(), $sql);
	}

	function deleteColor($id) {
		// Delete a color from database
		$sql = "DELETE FROM colors WHERE id=" . $id;
		$request = pg_query(getDb(), $sql);
	}

?>