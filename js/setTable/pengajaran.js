$(function(){
   $("#tablePengajaran").bootstrapTable({
       columns:[
           {
               title: "No",
               field: "No",
               align: "center"
           }, {
               title: "Mata Kuliah",
               field: "MataKuliah",
               align: "center",
               halgin: "left"
           }, {
               title: "Program Pendidikan",
               field: "ProgramPendidikan",
               align: "center",
               halgin: "left"
           }, {
               title: "Institusi",
               field: "Institusi",
               align: "center"
           }, {
               title: "Jurusan",
               field: "Jurusan",
               align: "center"
           }, {
               title: "Program Studi",
               field: "ProgramStudi",
               align: "center"
           }, {
               title: "Semester",
               field: "Semester",
               align: "center"
           }, {
               title: "Tahun Akademik",
               field: "TahunAkademik",
               align: "center"
           }, {
               title: "SK",
               field: "SK",
               align: "center"
           }, {
               title: "Action",
               field: "Action",
               align: "center"
           }
       ]
   });
});
