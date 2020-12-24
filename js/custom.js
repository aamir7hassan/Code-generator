$('#models,#weapons,#bodygroup,#bodyvalue,#ammotype,#ammoamount,#jobs,#groups,#steamids').tagsinput({width:'auto'});

$('#method').on('change',function(){
   if($(this).val()=="") {
      $('.emethod').removeClass('d-none').html(' Method field is required,  &nbsp;');
   } else {
      $('.emethod').addClass('d-none');
   }
   if($('#method').val()==1) {
      $('.option1').removeClass('d-none');
      $('.option2').addClass('d-none');
      $('.option3').addClass('d-none');
      $('.cjobs').removeClass('d-none');
      $('.cadmin').addClass('d-none');
      $('.csteamids').addClass('d-none');
      jobs();
   } else if($('#method').val()==2) {
      $('.option2').removeClass('d-none');
      $('.option1').addClass('d-none');
      $('.option3').addClass('d-none');
      $('.cjobs').addClass('d-none');
      $('.cadmin').removeClass('d-none');
      $('.csteamids').addClass('d-none');
      if($('#adminsystem').val()=="") {
         $('.eadminsystem').removeClass('d-none').html(' Adminsystem field in required &nbsp;');
      } else {
         $('.eadminsystem').addClass('d-none');
      }

		adminSystem();
       groups();
   } else if($('#method').val()==3) {
      $('.option3').removeClass('d-none');
      $('.option2').addClass('d-none');
      $('.option1').addClass('d-none');
      $('.cjobs').addClass('d-none');
      $('.cadmin').addClass('d-none');
      $('.eadminsystem').addClass('d-none');
      $('.csteamids').removeClass('d-none');
      steamIds();
   }
});

$('#type').change(function() {
   if($(this).prop("checked")) {
      $('.typec').removeClass('d-none');
      $('.typess').removeClass('d-none');
	  if($('#mayor').val()==1){
		  $('.mayor').removeClass('d-none');
	  }
	  if($('#chief').val()==1) {
		  $('.chief').removeClass('d-none');
	  }
	  if($('#medic').val()==1) {
		  $('.medic').removeClass('d-none');
	  }
	  if($('#cook').val()==1) {
		  $('.cook').removeClass('d-none');
	  }
	  if($('#hobo').val()==1) {
		  $('.hobo').removeClass('d-none');
	  }
      types();
   } else {
      $('.typec').addClass('d-none');
      $('.typess').addClass('d-none');
	  $('.mayor').addClass('d-none');
	  $('.chief').addClass('d-none');
	  $('.medic').addClass('d-none');
	  $('.cook').addClass('d-none');
	  $('.hobo').addClass('d-none');
   }
});
$('#custom').change(function() {
   if($(this).prop("checked")) {
      if($('#visibility').val()=="") {
         $('.evisibility').removeClass('d-none').html(' Visibility field is required,  &nbsp;');
      }
      if($('#method').val()=="") {
         $('.emethod').removeClass('d-none').html(' Method field is required,  &nbsp;');
      }
      $('.customc').removeClass('d-none');
      $('.checks').removeClass('d-none');
      custom();
   } else {
      $('.customc').addClass('d-none');
      $('.checks').addClass('d-none');
      $('.evisibility').addClass('d-none');
      $('.emethod').addClass('d-none');
   }
});
$('#spawn').change(function() {
   if($(this).prop("checked")) {
	   console.log('checked spawn');
      $('.spawnc').removeClass('d-none');
      $('.spawnss').removeClass('d-none');
      $('.cammo').removeClass('d-none');

      $('#health').on('keyup',function(){
         $str = $('#health').val();
         if($str==""){
            $('.func').addClass('d-none');
         } else {
            $('.func').removeClass('d-none');
            $('.health').html('ply:SetMaxHealth('+$str+')<br>                ply:SetHealth('+$str+')');
         }
      });
      $('#armor').on('keyup',function(){
         $str = $('#armor').val();
         if($str==""){
            $('.func').addClass('d-none');
         } else {
            $('.func').removeClass('d-none');
            $('.armor').html('ply:SetArmor('+$str+')');
         }
      });
      ammo();
      parentbody();
   } else {
      $('.spawnc').addClass('d-none');
      $('.spawnss').addClass('d-none');
      $('.cammo').addClass('d-none');
   }
});

$('#other').change(function(){
   if($(this).prop("checked")) {
      $('.otherc').removeClass('d-none');
      $('.otherss').removeClass('d-none');
      others();
   } else {
      $('.otherc').addClass('d-none');
      $('.otherss').addClass('d-none');
   }
});

$(document).on('keyup','#name',function(){
   var stt=$(this).val();
   $(".cname").text(stt);
   if(stt=="") {
      $('.ename').removeClass('d-none');
   } else {
      $('.ename').addClass('d-none');
   }
});
$(document).on('focusout','#color',function(e){
	console.log($('#color').val());
   var stt=hex2rgb($(this).val());
		$(this).val('Color('+stt+',255)');
     $(".ccolor").text('Color('+stt+',255)');

});
function hex2rgb(hex) {
        // long version
        r = hex.match(/^#([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i);
        if (r) {
                return r.slice(1,4).map(function(x) { return parseInt(x, 16); });
        }
        // short version
        r = hex.match(/^#([0-9a-f])([0-9a-f])([0-9a-f])$/i);
        if (r) {
                return r.slice(1,4).map(function(x) { return 0x11 * parseInt(x, 16); });
        }
        return null;
  }
$(document).on('keyup','#description',function(){
   var stt = $(this).val();
   $('.cdescription').text(stt);
   if(stt=="") {
      $('.edesc').removeClass('d-none');
   } else {
      $('.edesc').addClass('d-none');
   }
});
$(document).on('keyup','#teamID',function(){
   var stt = $(this).val();
   $('.teamid').text(stt);
   if(stt=="") {
      $('.eteamid').removeClass('d-none');
   } else {
      $('.eteamid').addClass('d-none');
   }
});


$(document).on('itemAdded','#models',function(e) {
	console.log(e);
   var str = e.item;
   var cmd = str.split('/').join('--');
   cmd = cmd.split(',').join('_');
   cmd = cmd.split('.').join('__');
   str = '"'+str+'"';
   var spans = $(".cmodel  span").length;
   if(spans<=0){
      var comma = ',<br>';
      $('.cmodel').append('<span class="m-'+cmd+'">'+str+comma+'</span>');
      var con = $('.cmodel').children().last().text();
      console.log(con);
      var lchart = con.slice(-1);
      if(lchart==",") {
         $('.m-'+cmd).text(str);
      }
   } else {
      var comma=",<br>";
      var con = $('.cmodel').children().last().text();
      var lchart = con.slice(-1);
      if(lchart==","){
         con = con.slice(0,-1);
         $('.cmodel').append('<span class="m-'+cmd+'">'+str+comma+'</span>');
      } else {
         $('.cmodel').append('<span class="m-'+cmd+'">'+comma+str+'</span>');
      }
   }
   if(str=="") {
      $('.emodel').removeClass('d-none');
   } else {
      $('.emodel').addClass('d-none');
   }
});

$('#models').on('itemRemoved',function(e){
   var str = e.item;
	console.log(str);
   var cmd = str.split('/').join('--');
   cmd = cmd.split(',').join('_');
   cmd = cmd.split('.').join('__');
   console.log(cmd);
   if($('.cmodel').find('.m-'+cmd)) {
     $('.m-'+cmd).remove();
     var s = $('.cmodel').children().first().text();
     s = (s.length && s[0] == ',') ? s.slice(1) : s;
     $('.cmodel').children().first().text(s);
  }


});

$(document).on('keyup','#category',function(){
   var stt = $(this).val();
   $('.ccategory').html("category = "+'"'+stt+'",');
});
$(document).on('itemAdded','#weapons',function(e){
   var str = e.item;
   str = '"'+str+'"';
   var spans = $(".cweapons  span").length;
   if(spans<=0){
      var comma = ",";
      $('.cweapons').append('<span class="w-'+e.item+'">'+str+comma+'</span>');
      var con = $('.cweapons').children().last().text();
      var lchart = con.slice(-1);
      if(lchart==",") {
         $('.w-'+e.item).text(str);
      }
   } else {
      var comma=",";
      var con = $('.cweapons').children().last().text();
      var lchart = con.slice(-1);
      if(lchart==","){
         con = con.slice(0,-1);
         $('.cweapons').append('<span class="w-'+str+'">'+str+comma+'</span>');
      } else {
         $('.cweapons').append('<span class="w-'+str+'">'+comma+str+'</span>');
      }
   }

   if(str=="") {
      $('.eweapons').removeClass('d-none');
   } else {
      $('.eweapons').addClass('d-none');
   }
});

$(document).on('keyup','#command',function(e){
   var str = $(this).val();
   $('.ccommand').html(str);
   if(str=="") {
      $('.ecommand').removeClass('d-none');
   } else {
      $('.ecommand').addClass('d-none');
   }
});
$(document).on('keyup','#change',function(e){
   var str = $(this).val();
   $('.cchange').html("NeedToChangeFrom = "+str+',');
   if(str=="") {
      $('.echange').removeClass('d-none');
   } else {
      $('.echange').addClass('d-none');
   }
});
$(document).on('keyup','#max',function(e){
   var str = $(this).val();
   $('.cmax').html(str);
   if(str=="") {
      $('.emax').removeClass('d-none');
   } else {
      $('.emax').addClass('d-none');
   }
});
$(document).on('keyup','#salary',function(e){
   var str = $(this).val();
   $('.csalary').html(str);
   if(str=="") {
      $('.esalary').removeClass('d-none');
   } else {
      $('.esalary').addClass('d-none');
   }
});
$(document).on('change','#access',function(e){
   var str = $(this).val();
   $('.caccess').text(str);
   if(str=="") {
      $('.eaccess').removeClass('d-none');
   } else {
      $('.eaccess').addClass('d-none');
   }
});
$(document).on('change','#vote',function(e){
   var str = $(this).val();
   $('.cvote').text(str);
   if(str=="") {
      $('.evote').removeClass('d-none');
   } else {
      $('.evote').addClass('d-none');
   }
});
$(document).on('change','#license',function(e){
   var str = $(this).val();
   $('.clicense').text(str);
   if(str=="") {
      $('.elicense').removeClass('d-none');
   } else {
      $('.elicense').addClass('d-none');
   }
});
$(document).on('change','#demote',function(e){
   var str = $(this).val();
   $('.candemote').text(str);
   if(str=="") {
      $('.edemote').removeClass('d-none');
   } else {
      $('.edemote').addClass('d-none');
   }
});

function validations() {
	var error = false;
   if($('#name').val()=="") {
	   error = true;
      $('.Error').removeClass('d-none').html('Please fill all below fields ,otherwise below code might not work properly.');
   }
   if($('#teamID').val()=="") {
         error = true;
      $('.eteamid').removeClass('d-none').html(' Team Id field is required , ');
   }
   if($('#name').val()=="") {
         error = true;
      $('.ename').removeClass('d-none').html(' Name field is required,  &nbsp;');
   }
   if($('#model').val()=="") {
         error = true;
      $('.emodel').removeClass('d-none').html(' Model field is required,  &nbsp;');
   }
   if($('#description').val()=="") {
         error = true;
      $('.edesc').removeClass('d-none').html(' Description field is required,  &nbsp;');
   }
   if($('#command').val()=="") {
         error = true;
      $('.ecommand').removeClass('d-none').html(' Command field is required,  &nbsp;');
   }
   if($('#weapons').val()=="") {
        error = true;
      $('.eweapons').removeClass('d-none').html(' Weapons field is required,  &nbsp;');
   }
   if($('#change').val()=="") {
         error = true;
      $('.echange').removeClass('d-none').html(' Change field is required,  &nbsp;');
   }
   if($('#access').val()=="") {
         error = true;
      $('.eaccess').removeClass('d-none').html(' Access field is required,  &nbsp;');
   }
   if($('#vote').val()=="") {
         error = true;
      $('.evote').removeClass('d-none').html(' Vote field is required,  &nbsp;');
   }
   if($('#license').val()=="") {
        error = true;
      $('.elicense').removeClass('d-none').html(' License field is required,  &nbsp;');
   }
   if($('#demote').val()=="") {
         error = true;
      $('.edemote').removeClass('d-none').html(' Demote field is required,  &nbsp;');
   }
   if($('#salary').val()=="") {
         error = true;
      $('.esalary').removeClass('d-none').html(' Salary field is required,  &nbsp;');
   }
   if($('#max').val()=="") {
         error = true;
      $('.emax').removeClass('d-none').html(' Max field is required,  &nbsp;');
   }
   if(error==false) {
      alert('Spans finish');
      $('.Error').removeClass('text-danger').addClass('text-success').html('Now the code is valid');
   }
}


function copyDivToClipboard() {
    var range = document.createRange();
    range.selectNode(document.getElementById("copy"));
    window.getSelection().removeAllRanges(); // clear current selection
    window.getSelection().addRange(range); // to select text
    document.execCommand("copy");
    window.getSelection().removeAllRanges();// to deselect
    alert('Text Copied');
}

function ammo() {
   //cammoss
   var keys = [];var vals = [];
   var gkeys = $('#ammotype').tagsinput('items');
   var gvals = $('#ammoamount').tagsinput('items');

   $('#ammotype,#ammoamount').on('itemAdded',function(e) {

      $('.cammo').removeClass('d-none');
      var btag = e.target.attributes.id.nodeValue;
      var str = e.item;
      var kcount = gkeys.length;
      var vcount = gvals.length;
      keyCount = keys.length;
      valsCount = vals.length;
      $('.func').removeClass('d-none');
      var comma = ",<br>";
      if(btag=="ammotype") {
         var gkeyss = $('#ammotype').tagsinput('items');
         var gvalss = $('#ammoamount').tagsinput('items');

         keys.push(str);
         if(gvalss.length >= gkeyss.length) {
            console.log('G if');
            var diff = Math.abs(gvalss.length-gkeyss.length);
            var lastVal = gkeyss.length-1;
            console.log(lastVal);
            var value = gvalss[lastVal];
            console.log(value);
            fnd = $.inArray(value,gvalss);
            console.log("fnd "+fnd);
            if(fnd!=-1 && fnd!=0) {
               console.log('find!=-1');
               $('span.ammo-'+gkeyss[fnd]+' .a-'+gvalss[fnd]).html(str+comma);
               //gvalss[fnd] = str;
               $('span.ammo-'+gkeyss[fnd]+' .a-'+gvalss[fnd]).removeClass('a-'+gvalss[value]).addClass('a-'+gvalss[fnd]);
            } else {
               console.log('simple push');
               gvalss.push(str);
            }
            if(value=="undefined") var ff=0; else var ff=value;
            console.log(ff);
            $('.cammoss').append('<span class="ammo-'+str+' ammo-'+ff+'">["'+str+'"] = <span class="a-'+fnd+'">'+ff+comma+'</span></span>');
         } else if(gkeys.length > gvals.length) {
            console.log('G else');
            for(var a=keyCount;a==keyCount;a++) {
               if(typeof vals[a]=="undefined") {
                  var val = 0;
               } else { var val = vals[a];}
               $('.cammoss').append('<span class="ammo-'+keys[a]+' ammo-'+val+'">["'+keys[a]+'"] = <span class="a-'+val+'">0'+comma+'</span></span>');
                  //vals[a]="abc";
            }
         }
      } else if(btag=="ammoamount") {
         if(vcount>=1) {
            console.log('one');
            fnd = $.inArray(0,gvals);
            if(fnd!=-1) {
               $('span.ammo-'+gkeys[fnd]+' .a-'+gvals[fnd]).html(str+comma);
               gvals[fnd] = str;
               console.log(gvals[fnd]=str);
               $('span.ammo-'+gkeys[fnd]+' .a-'+gvals[fnd]).removeClass('a-'+gvals[fnd]).addClass('a-'+str);
            } else {
               vals.push(str);
            }
         } else {
            console.log('two')
         }
         if(vals.length>0){
            fnd = keys[vals.indexOf(str)];
            $('span.ammo-'+fnd+' .a-0').html(str+comma).addClass('a-'+str).removeClass('a-0');
         }
      }

   });
}

function parentbody() {
   var keys = [];
   var vals = [];
   $('#bodygroup,#bodyvalue').on('itemAdded',function(e){
      var btag = e.target.attributes.id.nodeValue;
	  console.log(btag);
	  
      var str = e.item;
	  console.log(str);
      $('.func').removeClass('d-none');
      if(btag=="bodygroup") {
         keys.push(str);
      } else if(btag=="bodyvalue") {
         vals.push(str);
      }
      keyCount = keys.length;
      valsCount = vals.length;
      var check="";
      var chk = $('.groups span').length;
      if(chk<=0){
         var comma = "";
      } else {var comma="<br>";}

      if(keyCount >= valsCount) {
         for(var a=0;a<keyCount;a++) {
            if(typeof vals[a]=='undefined' || vals[a]=='abc') {
               continue;
            } else {
               $('.groups').append(comma+'<span class="app-'+keys[a]+' app-'+vals[a]+'">ply:SetBodygroup('+keys[a]+','+vals[a]+')</span>');
               vals[a]="abc";
            }
         }
      } else if(valsCount > keyCount) {
         for(var a=0;a<valsCount;a++) {
            if(typeof keys[a]=='undefined' || vals[a]=='abc') {
               continue;
            } else {
               $('.run').append(keys[a]+":"+vals[a]);
               $('.groups').append(comma+'<span class="app-'+keys[a]+' app-'+vals[a]+'">ply:SetBodygroup('+keys[a]+','+vals[a]+')</span>');
               vals[a]="abc";
               keys[a]="abc";
            }
         }
      } else {
         console.log('No found value');
      }
   });

   /// for removing items;
   $('#bodygroup,#bodyvalue').on('itemRemoved', function(e) {
      var btag = e.target.attributes.id.nodeValue;
      var str = e.item;
     if(btag=='bodygroup') {
        if($('.groups').find('span.app-'+e.item)) {
           $('span.app-'+e.item).remove();
        }
     } else if(btag=='bodyvalue') {
        if($('.groups').find('span.app-'+e.item)) {
          $('span.app-'+e.item).remove();
       }
     } else {
        console.log('Invalid node value');
     }
   });
   $('#ammotype,#ammoamount').on('itemRemoved',function(e) {
      var btag = e.target.attributes.id.nodeValue;
      var str = e.item;

      if(btag=='ammotype') {
         if($('.cammoss').find('span.ammo-'+e.item)) {
           $('span.ammo-'+e.item).remove();
           rearrangeArray(btag);
         }
      } else if(btag=='ammoamount') {

         if($('.cammoss').find('span.ammo-'+e.item)) {
            var keys = $('#ammotype').tagsinput('items');
            var vals = $('#ammoamount').tagsinput('items');
            var countKeys = keys.length;
            var countVals = vals.length;
            var diff = Math.abs(countKeys-countVals);
            var comma = ",<br>";$('.cammoss span').remove();
            if(countVals < countKeys) {
               for(var a=0;a<diff;a++) {
                  console.log('push 0');
                  vals.push(0);
               }
            }
            if(countKeys>=countVals) {
               console.log('first');
               for(var a=0;a<countKeys;a++) {
                  if(typeof vals[a]=='undefined') {
                     continue;
                  } else {
                     $('.cammoss').append('<span class="ammo-'+keys[a]+' ammo-'+vals[a]+'">["'+keys[a]+'"] = <span class="a-'+vals[a]+'">'+vals[a]+comma+'</span></span>');
                  }
               }

            } else {
               console.log('second');
               for(var a=0;a<countKeys;a++) {
                  if(typeof vals[a]=='undefined') {
                     continue;
                  } else {
                     $('.cammoss span').remove();
                     $('.cammoss').append('<span class="ammo-'+keys[a]+' ammo-'+vals[a]+'">["'+keys[a]+'"] = <span class="a-'+vals[a]+'">'+vals[a]+comma+'</span></span>');
                  }
               }
            }
        }
      } else {
         console.log('Invalid node value');
      }
   });
}

function rearrangeArray(arg) {
   var keys = $("#ammotype").tagsinput('items');
   var vals = $('#ammoamount').tagsinput('items');
   // console.log("keys "+keys);
   // console.log("keys "+vals);
   keyCount = keys.length;
   valsCount = vals.length;
   var chk = $('.cammoss span').length;
   var comma = ",<br>";
   if(arg=='ammotype') {
      $('.cammoss span').remove();
   }
   if(keyCount >= valsCount) {
      for(var a=0;a<keyCount;a++) {
         console.log("vals[a] "+vals[a]);
         if(typeof vals[a]=='undefined') {
            continue;
         } else {
            $('.cammoss').append('<span class="ammo-'+keys[a]+' ammo-'+vals[a]+'">["'+keys[a]+'"] = <span class="a-'+vals[a]+'">'+vals[a]+comma+'</span></span>');
         }
      }
   } else if(valsCount > keyCount) {
      for(var a=0;a<valsCount;a++) {
         console.log("keys[a] "+keys[a]);
         if(typeof keys[a]=='undefined' ) {
            continue;
         } else {
            $('.cammoss').append('<span class="ammo-'+keys[a]+' ammo-'+vals[a]+'">["'+keys[a]+'"] = <span class="a-'+vals[a]+'">'+vals[a]+comma+'</span></span>');
         }
      }
   } else {
      console.log('No found value');
   }
}

$('#weapons').on('itemRemoved',function(e){
   var str = e.item;
   if($('.cweapons').find('.w-'+str)) {
     $('.w-'+str).remove();
     var s = $('.cweapons').children().first().text();
     s = (s.length && s[0] == ',') ? s.slice(1) : s;
     $('.cweapons').children().first().text(s);
   }
});

$('#jobs').on('itemRemoved',function(e){
   var str = e.item;
   if($('.cjobss').find('.j-'+str)) {
     $('.j-'+str).remove();
     var s = $('.cjobss').children().first().text();
     s = (s.length && s[0] == ',') ? s.slice(1) : s;
     $('.cjobss').children().first().text(s);
   }
});
$('#groups').on('itemRemoved',function(e){
   var str = e.item;
   if($('.ids').find('.g-'+str)) {
     $('.g-'+str).remove();
     var s = $('.ids').children().first().text();
     s = (s.length && s[0] == ',') ? s.slice(1) : s;
     $('.ids').children().first().text(s);
   }
});
$('#steamids').on('itemRemoved',function(e){
   var str = e.item;
   if($('.stids').find('.s-'+str)) {
     $('.s-'+str).remove();
     var s = $('.stids').children().first().text();
     s = (s.length && s[0] == ',') ? s.slice(1) : s;
     $('.stids').children().first().text(s);
   }
});

function types()
{
	$('#mayor').on('change',function(){
         $('.mayor').removeClass('d-none');
         $val = $('#mayor').val();
         if($val==1) {
            $('.mayor').html('mayor = true,');
         } else {
            $('.mayor').text('');
         }
      });
      $('#chief').on('change',function(){
         $val = $('#chief').val();
         $('.chief').removeClass('d-none');
         if($val==1) {
            $('.chief').html('chief = true,');
         } else {
            $('.chief').text('');
         }
      });
      $('#medic').on('change',function(){
         $val = $('#medic').val();
         $('.medic').removeClass('d-none');
         if($val==1) {
            $('.medic').html('medic = true,');
         } else {
            $('.medic').text('');
         }
      });
      $('#cook').on('change',function(){
         $('.cook').removeClass('d-none');
         $val = $('#cook').val();
         if($val==1) {

            $('.cook').html('cook = true,');
         } else {
            $('.cook').text('');
         }
      });
      $('#hobo').on('change',function(){
         $('.hobo').removeClass('d-none');
         $val = $('#hobo').val();
         if($val==1) {

            $('.hobo').html('hobo = true,');
         } else {
            $('.hobo').text('');
         }
      });
}

// function jobs
function jobs()
{
	$('#jobs').on('itemAdded',function(e){
         var str = e.item;
         var spans = $(".cjobss span").length;
         if(spans<=0){
            var comma = ",";
            $('.cjobss').append('<span class="j-'+str+'">'+str+comma+'</span>');
            var con = $('.cjobss').children().last().text();
            var lchart = con.slice(-1);
            if(lchart==",") {
               $('.j-'+str).text(str);
            }
         } else {
            var comma=",";
            var con = $('.cjobss').children().last().text();
            var lchart = con.slice(-1);
            if(lchart==","){
               con = con.slice(0,-1);
               $('.cjobss').append('<span class="j-'+str+'">'+str+comma+'</span>');
            } else {
               $('.cjobss').append('<span class="j-'+str+'">'+comma+str+'</span>');
            }
         }
      });
}

function adminSystem()
{
	$('#adminsystem').on('change',function(){
         var val = $('#adminsystem').val();

         if(val==1) {
            $('.cadmin').html("table.HasValue({<span class='ids'></span>}, ply:GetNWString('usergroup'))");
            $('.ids').html('');
            $('.eadminsystem').removeClass('d-none').html(' Adminsystem field in required &nbsp;');
         } else {
            $('.ids').html('');
            $('.cadmin').html("table.HasValue({<span class='ids'></span>}, serverguard.player:GetRank(ply))");
            $('.eadminsystem').addClass('d-none');
         }
      });
}
function groups()
{
	$('#groups').on('itemAdded',function(e){
         var str = e.item;
         str = '"'+str+'"';
         var spans = $(".ids span").length;
         if(spans<=0) {
            var comma = ",";
            $('.ids').append('<span class="g-'+e.item+'">'+str+comma+'</span>');
            var con = $('.ids').children().last().text();
            var lchart = con.slice(-1);
            if(lchart==",") {
               $('.g-'+e.item).text(str);
            }
         } else {
            var comma=",";
            var con = $('.cjobss').children().last().text();
            var lchart = con.slice(-1);
            if(lchart==",") {
               con = con.slice(0,-1);
               $('.ids').append('<span class="g-'+e.item+'">'+str+comma+'</span>');
            } else {
               $('.ids').append('<span class="g-'+e.item+'">'+comma+str+'</span>');
            }
         }

      });
}
function steamIds()
{
	$('#steamids').on('itemAdded',function(e){
         var str = e.item;
         str = '"'+str+'"';
         var spans = $(".stids span").length;
         if(spans<=0){
            var comma = ",";
            $('.stids').append('<span class="s-'+e.item+'">'+str+comma+'</span>');
            var con = $('.stids').children().last().text();
            var lchart = con.slice(-1);
            if(lchart==",") {
               $('.s-'+e.item).text(str);
            }
         } else {
            var comma=",";
            var con = $('.stids').children().last().text();
            var lchart = con.slice(-1);
            if(lchart==","){
               con = con.slice(0,-1);
               $('.stids').append('<span class="s-'+e.item+'">'+str+comma+'</span>');
            } else {
               $('.stids').append('<span class="s-'+e.item+'">'+comma+str+'</span>');
            }
         }

      });
}

function custom()
{
	$('#checkmessage').on('keyup',function(){
         var val = $('#checkmessage').val();
         $('.cmessage').text(val);
    });
    $('#visibility').on('change',function(){
         var val = $('#visibility').val();
         if(val==1) {
            $('.list').html(' CLIENT or');
            $('.list').removeClass('d-none');
         } else {
            $('.list').addClass('d-none');
         }
         if(val=="") {
            $('.evisibility').removeClass('d-none');
         } else {
            $('.evisibility').addClass('d-none');
         }
    });
}

function others()
{
	$('#demotedeath').on('change',function(){
         var val = $('#demotedeath').val();
         if(val==1) {
            $('.funcO').removeClass('d-none');
         } else {
            $('.funcO').addClass('d-none');
         }
      });
      $('#demotemessage').on('keyup',function(){
         var val = $('#demotemessage').val();
         $('.omessage').text(val);
      }); 
}
