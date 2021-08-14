<!DOCTYPE html>
<html>
<head>
    <title>Tittle</title>
    <style type="text/css" media="print">
    @page {
        margin: 0;  /* this affects the margin in the printer settings */
    }
      table{
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
      }
      table th{
          -webkit-print-color-adjust:exact;
        border: 1px solid;

                padding-top: 11px;
    padding-bottom: 11px;
    background-color: #a29bfe;
      }
   table td{
        border: 1px solid;

   }
        </style>
</head>
<body>
    <h3 align="center">DATA Nilai</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
    <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nilai Unmatematika</th>
		<th>Nilai Unbinggris</th>
		<th>Nilai Unbindonesia</th>
		<th>Id Calonsiswa</th>
		
            </tr><?php
            foreach ($nilai_data as $nilai)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $nilai->nilai_unmatematika ?></td>
		      <td><?php echo $nilai->nilai_unbinggris ?></td>
		      <td><?php echo $nilai->nilai_unbindonesia ?></td>
		      <td><?php echo $nilai->id_calonsiswa ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
</body>
<script type="text/javascript">
      window.print()
    </script>
</html>