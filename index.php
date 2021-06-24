<!DOCTYPE html>

<html lang="en"> 
    <head>
       <meta http-equiv="Content-Type" Content="text/html; charset=UTF-8">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.5.0/jszip.js"></script>
       <title>Data Process</title>
    </head>
    <body>


        <div class="container" style="border :1px solid #e7e7e7; margin-top:50px;padding:50px 20px 50px 20px;">
            <h1 style="text-align:center">Data Process Program </h1>
            <form  method="post" enctype="multipart/form-data" style="margin-top:70px">
                <p style="float:left; font-size:24px;"> Upload data file: &nbsp;&nbsp; &nbsp; </p>
                <input type="file" class="form-control" id="fileToUpload" name="fileToUpload" value="fileToUpload" style="width:300px; float:left; " webkitdirectory multiple> 
                <input type="submit" value="Upload data" name="uploadsubmit" id="datauploadsubmit" style="margin-left:30px; height:32px;" >
            </form>
            <br /> 
            <form method="post" style="float:left">    
                <button id="process" type="submit" name="processname"  value="processvalue" class="btn btn-primary" style="margin-top:30px;" >&nbsp; data process  &nbsp;</button> </br>
                <br />
                <a href="/view/view.php" target="_blank">
                    <button id="dataview" type="button" name="dataviewname" value="dataviewvalue" class="btn btn-primary" >&nbsp; &nbsp;  data view &nbsp; &nbsp; &nbsp; </button>
                </a>
                <br />
                <p style="font-size:24px; margin-top:40px;"> data download </p>
                <br />
                <button id="download" type="button" name="downloadname" value="downloadvalue" class="btn btn-primary" > &nbsp; &nbsp; download &nbsp; &nbsp; &nbsp; </button>
                <a href="/data/semi_pointcloud.txt" download >
                    <p style="margin-top:20px;" >semi_pointcloud.txt</p>
                </a>
                <a href="/data/semi_pointcloud-pcl-1-8.pcd" download >
                    <p style="margin-top:20px;" >semi_pointcloud(pcl-1.8).pcd</p>
                </a>
            </form>
            <div style="float:left; margin-left:30px;">    
                <textarea id="returnvalue" name="returnvalue"  style="width:800px; height:400px;"></textarea>
            </div>
        </div>
    </body>
    <script>
        $(function(){
            $('#process').click(function(e){
                e.stopPropagation();
                e.preventDefault();
                console.log("process click");
                $.post('/api.php', {data_process: "aaa"}).then(function(res){
                    $('#returnvalue').text(res);
                });
            });

            $('#datauploadsubmit').click(function (e){
                e.stopPropagation();
                e.preventDefault();
                var formdata = new FormData();
                var files = $('#fileToUpload')[0].files;
                var zip = new JSZip();
                for ( let i=0; i< files.length; i++) {
                    let file = files[i];
                    var path = file.webkitRelativePath;
                    var spath = path.substr(1);
                    var num = spath.search("/");
                    var dpath = spath.substr( num);
                    var directory = "/datafile" + dpath;
                    zip.file( directory , file);
                    console.log(directory);
                }
                $('#returnvalue').text( "Uploading data ...  , Please waiting");
                zip.generateAsync({ type:"blob"})
                .then(function(content) {
                    formdata.append("file", "file");
                    formdata.append("folderzip", content);
                    $.ajax({
                        url:"/upload.php",
                        data : formdata,
                        processData: false,
                        contentType: false,
                        type:'post',
                        success: function(data) {
                            console.log(data);
                            $('#returnvalue').text(data);
                        }
                    });
                });

            });
        });
    </script>
</html>    
