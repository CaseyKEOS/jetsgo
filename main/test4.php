<!DOCTYPE html>
<html>
<head>
  <title>Selectable DataTable Example</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
</head>
<body>
  <table id="myTable">
    <thead>
      <tr>
        <th>Select</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><input type="checkbox"></td>
        <td>John Doe</td>
        <td>john@example.com</td>
        <td>1234567890</td>
      </tr>
      <!-- Add more rows here -->
    </tbody>
  </table>

  <input type="text" id="nameInput">
  <input type="text" id="emailInput">
  <input type="text" id="phoneInput">

  <script>
    $(document).ready(function() {
      var table = $('#myTable').DataTable({
        columnDefs: [{
          orderable: false,
          className: 'select-checkbox',
          targets: 0
        }],
        select: {
          style: 'multi',
          selector: 'td:first-child'
        },
        order: [[1, 'asc']]
      });

      table.on('select', function(e, dt, type, indexes) {
        var selectedRows = table.rows({ selected: true }).data().toArray();
        updateInputFields(selectedRows);
      });

      table.on('deselect', function(e, dt, type, indexes) {
        var selectedRows = table.rows({ selected: true }).data().toArray();
        updateInputFields(selectedRows);
      });

      function updateInputFields(rows) {
        if (rows.length > 0) {
          var selectedRowData = rows[0];
          $('#nameInput').val(selectedRowData[1]);
          $('#emailInput').val(selectedRowData[2]);
          $('#phoneInput').val(selectedRowData[3]);
        } else {
          $('#nameInput').val('');
          $('#emailInput').val('');
          $('#phoneInput').val('');
        }
      }
    });
  </script>
</body>
</html>
