function addRow(elemento, tableID, clase ) {

    var table = document.getElementById(tableID);

    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);
	row.className = clase;

    var colCount = table.rows[0].cells.length;

    for(var i=0; i<colCount; i++) {
        var newcell = row.insertCell(i);
        newcell.innerHTML = elemento[i];
    }
}

function borra_tabla(tableID) {
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	console.log = rowCount;
	while (table.rows.length>1) {
        table.deleteRow(1);
    }
}
