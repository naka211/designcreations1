<form name="import" id="import" method="post" action="index.php" enctype="multipart/form-data">
Chọn file Excel :
<input type="file" name="fileExcel" id="fileExcel" />&nbsp;&nbsp;
<input type="submit" value="Import" />
<input type="hidden" name="option" value="com_ecommerce" />
<input type="hidden" name="controller" value="products" />
<input type="hidden" name="task" value="import_excel" />
</form>