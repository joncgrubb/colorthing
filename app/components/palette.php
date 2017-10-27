<form>
  <div class="form-row align-items-center">
    <div class="col-auto">
      <label class="sr-only" for="paletteName">Palette Name</label>
      <input type="text" class="form-control mb-2 mb-sm-0" id="paletteName" name="paletteName" placeholder="Derpy Color Palette">
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-secondary">Add Palette</button>
    </div>
  </div>
</form>

<?php

	// Common Functions...
	include_once('database.php');

	// Check for input and add palette if necessary
	if(isset($_GET['paletteName'])) {
		// Clean input variables
		$safeName = htmlentities($_GET['paletteName']);
		
		// Insert them
		addPalette($safeName);
	}

	if (isset($_GET['removePalette'])) {
		$safePalette = htmlentities($_GET['removePalette']);

		deletePalette($safePalette);
	}

	// Palette Functions
	function getPalettes() {
		// Return list of all saved colors
		$sql = "SELECT * FROM palettes ORDER BY palette_name;";
		$request = pg_query(getDb(), $sql);
		return pg_fetch_all($request);
	}

	function addPalette($name) {
		// Insert a new color into database
		$sql = "INSERT INTO palettes (palette_name) VALUES ('" . $name . "');";
		$request = pg_query(getDb(), $sql);
	}

	function deletePalette($id) {
		// Delete a palette from database
		$sql = "DELETE FROM palettes WHERE id=" . $id;
		$request = pg_query(getDb(), $sql);
	}

?>