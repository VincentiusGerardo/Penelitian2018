$(function(){
   $("#tablePembimbing").bootstrapTable({
       columns:[
           {
               title: "No",
               field: "No",
               align: "center"
           }, {
               title: "Nama",
               field: "Nama",
               align: "center"
           }, {
               title: "NIM",
               field: "NIM",
               align: "center"
           }, {
               title: "Semester",
               field: "Semester",
               halign: "center",
               align: "left"
           }, {
               title: "Tahun",
               field: "Tahun",
               align: "center"
           }, {
               title: "Program Pendidikan",
               field: "ProgramPend",
               align: "center"
           }, {
               title: "Judul",
               field: "Judul",
               align: "center"
           }, {
               title: "Peranan",
               field: "Peranan",
               align: "center"
           }, {
               title: "Action",
               field: "Action",
               align: "center"
           }
       ]
   });
});
