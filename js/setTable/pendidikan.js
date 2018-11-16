$(function(){
   $("#tablePendidikan").bootstrapTable({
       columns:[
           {
               title: "No",
               field: "No",
               align: "center"
           }, {
               title: "Program",
               field: "Program",
               align: "center"
           }, {
               title: "Tahun",
               field: "Tahun",
               align: "center"
           }, {
               title: "Nama Perguruan Tinggi",
               field: "NamaPT",
               halign: "center",
               align: "left"
           }, {
               title: "Jurusan",
               field: "Jurusan",
               align: "center"
           }
       ]
   });
});
