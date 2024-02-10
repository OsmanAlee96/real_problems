<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>

<style>
    form {
  width: 400px;
  margin: 20px auto;
  padding: 20px;
  border: 1px solid #ddd;
  border-radius: 5px;
}

fieldset {
  border: none;
  padding: 20px; /* Increased padding for form elements */
}

legend {
  font-size: 1.2em;
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"],
input[type="number"],
select {
    width: 100%;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    margin: 2px 0 10px 0;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #45A049;
}

</style>
</head>

<body>
<form action="action.php" method="post">
  <fieldset>
    <legend>Add New Book</legend>
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required>
    <br>
    <label for="author">Author:</label>
    <input type="text" id="author" name="author" required>
    <br>
    <label for="genre">Genre:</label>
    <select id="genre" name="genre">
    <option value="non-fiction" disabled selected >------</option>
      <option value="fiction" required>Fiction</option>
      <option value="non-fiction">Non-fiction</option>
      <option value="biography">Biography</option>
      <option value="science fiction">Science Fiction</option>
    </select>
    <br>
    <label for="publication_year" required>Publication Year:</label>
    <input type="number" id="publication_year" name="publication_year" min="1450" max="2024" required>
    <br>
    <button type="submit" name="addBookBtn" value="add">Add Book</button>
  </fieldset>
</form>


</body>

</html>