<html>
    <head>
        <title>Bulmaca Sözlük</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div class='form'>
            <div class='form-val 1'>
                <label>Bulmaca Sorusu Gir</label>
                <input  type='text' id='question' name='question'/>
                <select  id='choose'>
                    <option value='1'>eşit</option>
                    <option value='2'>içeren</option>
                    <option value='3'>ile başlayan</option>
                    <option value='4'>ile biten</option>
                </select>
            </div>
            <div class='form-val 2'>
                <label>Data Tipi Seç</label>
                <select  id='dataType'>
                    <option value='1'>JSON</option>
                    <option value='2'>XML</option>
                </select>
            </div>
            <div class='form-val 3'>
                <input  type='submit' id='showButton' name='showData'/>
            </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/index.js"></script>
</html>
