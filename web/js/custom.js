$(function()
    {
        $('#tab2nya').click(function(event){
            event.preventDefault();
            //            alert((startDate.format('YYYY-MM-DD') + ' - ' + endDate.format('YYYY-MM-DD')));

            $('#diag').html('');
            Morris.Bar({
                element: 'diag',
                data: [
                {
                    bawah: 'Anting', 
                    a: arrHistory[0]['gram'], 
                    b: arrHistory[0]['jumlah']
                },
                {
                    bawah: 'Bros', 
                    a: arrHistory[2]['gram'], 
                    b: arrHistory[1]['jumlah']
                },
                {
                    bawah: 'Cincin', 
                    a: arrHistory[2]['gram'], 
                    b: arrHistory[2]['jumlah']
                },
                {
                    bawah: 'Gelang', 
                    a: arrHistory[3]['gram'], 
                    b: arrHistory[3]['jumlah']
                },

                {
                    bawah: 'Kalung', 
                    a: arrHistory[4]['gram'], 
                    b: arrHistory[4]['jumlah']
                },

                {
                    bawah: 'Latakan', 
                    a: arrHistory[5]['gram'], 
                    b: arrHistory[5]['jumlah']
                }
    
                ],
                xkey: 'bawah',
                ykeys: ['a', 'b'],
                labels: ['Berat (gr)', 'Jumlah Item']
            });
            
        });
        
        $('#tab1nya').click(function(event){
            event.preventDefault();
            //            alert((startDate.format('YYYY-MM-DD') + ' - ' + endDate.format('YYYY-MM-DD')));
            //alert('wew');

            Morris.Donut({
                element: 'diag',
                data: [
                {
                    label: "Anting", 
                    value: arr['anting']
                },

                {
                    label: "Bros", 
                    value: arr['bros']
                },

                {
                    label: "Cincin", 
                    value: arr['cincin']
                },

                {
                    label: "Gelang", 
                    value: arr['gelang']
                },

                {
                    label: "Kalung", 
                    value: arr['kalung']
                },

                {
                    label: "Latakan", 
                    value: arr['latakan']
                }
                ]
            });
            
        });
        $('#periksa').click(function(event){
           
            event.preventDefault();
            //            alert((startDate.format('YYYY-MM-DD') + ' - ' + endDate.format('YYYY-MM-DD')));
            
            var urlx=$('#periksa').attr('data-url');
            urlx+='?start='+startDate.format('YYYY-MM-DD')+'|'+endDate.format('YYYY-MM-DD');
            //  alert(urlx);
            //alert(urlx);
            document.location=urlx;
        //            $.ajax(
        //            {
        //                url: urlx,
        //               
        //                    
        //                success:function(data)
        //                {
        //                   //  alert(data);
        //                    $('#areaApdet').html(data);
        //                    //$('#areaApdet').show();
        //                    //  $('#areaApdet').html(data);
        //                    //jika sukses ngapaen
        //                    
        //                }
        //            });
        });
        
        $('#periksas').click(function(event){
           
            event.preventDefault();
            //            alert((startDate.format('YYYY-MM-DD') + ' - ' + endDate.format('YYYY-MM-DD')));
            
            var urlx=$('#periksas').attr('data-url');
            urlx+='?start='+startDate.format('YYYY-MM-DD')+'|'+endDate.format('YYYY-MM-DD');
            //  alert(urlx);
            //alert(urlx);
            // $('#formIndex').attr('href',urlx);
            //  alert($('#formIndex').attr('href'));
            // $('#periksas').submit();
            document.location=urlx;
          
        // alert($('#tembakIndex').attr('href'));
        });
        
        
      
      
        $('#hitung').click(function(event){
            event.preventDefault();
            var harga=parseInt($('#textHarga').val());
            var urlx=$('#hitung').attr('data-url');
            // alert(urlx);
            urlx+='?nama='+harga;
            //alert(urlx);
            $.ajax(
            {
                url: urlx,
               
                    
                success:function(data)
                {
                    // alert(data);
                    $('#areaApdet').html(data);
                //$('#areaApdet').show();
                //  $('#areaApdet').html(data);
                //jika sukses ngapaen
                    
                }
            });
        });
      
        $('#hitung').click(function(event){
            event.preventDefault();
            var harga=parseInt($('#textHarga').val());
            var urlx=$('#hitung').attr('data-url');
            // alert(urlx);
            urlx+='?nama='+harga;
            //alert(urlx);
            $.ajax(
            {
                url: urlx,
               
                    
                success:function(data)
                {
                    // alert(data);
                    $('#areaApdet').html(data);
                //$('#areaApdet').show();
                //  $('#areaApdet').html(data);
                //jika sukses ngapaen
                    
                }
            });
        });
        $('#myForm input').on('change', function() {
            //  alert('xwew');
            $('#reservation').attr('value','');
            // alert($('input[name=satuan]:checked', '#myForm').val()); 
            var nilai= $('input[name=satuan]:checked', '#myForm').val();
            var urlx=$('#tipe').attr('data-url');
            urlx+='/tampil'+nilai;
            $.ajax(
            {
                url: urlx,
                    
                success:function(data)
                {
                    //   alert(data);
                    $('#areaApdet').html(data);
                //$('#areaApdet').show();
                //  $('#areaApdet').html(data);
                //jika sukses ngapaen
                    
                }
            });
        });
        $('#tipe').on('change', function(event) {
            event.preventDefault();
            //alert('wew');
            var nilai= this.value;
            var urlx=$('#tipe').attr('data-url');
            urlx+='/tampil'+nilai;
            $.ajax(
            {
                url: urlx,
                    
                success:function(data)
                {
                    //alert(data);
                    $('#areaApdet').html(data);
                //$('#areaApdet').show();
                //  $('#areaApdet').html(data);
                //jika sukses ngapaen
                    
                }
            });
        });
        
        $('#sup').on('change', function(event) {
            event.preventDefault();
           
            var nilai= this.value;
            var urlx=$('#tipe').attr('data-url');
            urlx+='/info?id='+nilai;
            //alert(urlx);
            $.ajax(
            {
                url: urlx,
                    
                success:function(data)
                {
                    $('#hasil2').html(data);
                //$('#areaApdet').show();
                //  $('#areaApdet').html(data);
                //jika sukses ngapaen
                    
                }
            });
        });
            
        
    });
function detail(tanggal)
{
    var urlx=$('#urlModal').attr('data-url');

    urlx+='/modal?id='+tanggal;
            
    // alert(tanggal);
    $.ajax(
    {
        url: urlx,
                    
        success:function(data)
        {
            // alert(data);
            $('#modalnyo').html(data);
        //$('#areaApdet').show();
        //  $('#areaApdet').html(data);
        //jika sukses ngapaen
                    
        }
    });
}
function brr(id)
{
  
    var urlx=$('#bar'+id).attr('data-url');
  
           
    $.ajax(
    {
        url: urlx,
                    
        success:function(data)
        {
           
            // alert(data);
            $('#barcodeModal').html(data);
        //$('#areaApdet').show();
        //  $('#areaApdet').html(data);
        //jika sukses ngapaen
                    
        }
    });
}
        
function detailAset(row)
{
    var urlx=$('#urlModals').attr('data-url');

    urlx+='/modal?id='+row;
            
    //  alert(urlx);
    $.ajax(
    {
        url: urlx,
                    
        success:function(data)
        {
            // alert(data);
            $('#modalnyox').html(data);
        //$('#areaApdet').show();
        //  $('#areaApdet').html(data);
        //jika sukses ngapaen
                    
        }
    });
}
function ubahStatus(row)
{
    //alert('wew');
   
      
    // $('#areaApdet').show();
       
    //alert(urlx);
    $.ajax(
    {
        url: urlx,
                    
        success:function(data)
        {
            // alert(data);
            document.getElementById("table1").rows[row+1].cells[3].innerHTML=data;
        //$('#areaApdet').show();
        //  $('#areaApdet').html(data);
        //jika sukses ngapaen
                    
        }
    });
    
           
}
function detailNotax(row)
{
    $('#hasilBarang').html();
}


function PrintElem(elem)
{
    Popup($(elem).html());
}

function Popup(data) 
{
    var mywindow = window.open('', 'my div', 'height=800,width=1000');
  //  mywindow.document.write('<html><head><title>Print Kitir</title>');
    /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
    //mywindow.document.write('</head><body >');
    mywindow.document.write(data);
   // mywindow.document.write('</body></html>');

    mywindow.print();
   // mywindow.close();

    return true;
}

