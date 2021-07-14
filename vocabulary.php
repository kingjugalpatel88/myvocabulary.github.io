<html>

<head>

    <?php
    echo file_get_contents("include/meta.php");
    ?>

</head>

<body onselectstart="return true" onpaste="return false;" onCopy="return true" onCut="return false" onDrag="return false" onDrop="return false" class="unselectable">

    <main>

        <?php
        include('include/decode.php');
        include('include/navbhar.php');
        ?>

        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-angle-up"></i></i></button>

        <div class="responsive unselectable">

            <!--Start table-->
            <div class="main">
                <div class="card  text-center">

                    <div class="card-body table-responsive ">

                        <div class="card-title" style="font-size:1.5rem; font-weight:bold; text-align:left;"> <?php echo $_GET['search']; ?></div>

                        <table id="my_table" class="table table-hover table-sm  unselectable">

                            <?php
                            if (empty($table[0]['pronunciation'])) {
                                $pron = "";
                            } else {
                                $pron = "PRONUNCIATION";
                            }
                            ?>
                            <thead class="thead-color ">
                                <tr>
                                    <th scope="col">INDEX</th>
                                    <th scope="col"></th>
                                    <th scope="col">WORDS</th>
                                    <th scope="col"><?php echo $pron; ?></th>
                                    <th scope="col">MEANINGS</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="border border-light ">

                                <?php
                                if ($table == !null) {
                                    foreach ($table as $index => $value) {
                                        if (empty($value['pronunciation'])) {
                                            $pro = "";
                                        } else {
                                            $pro = $value['pronunciation'];
                                        }

                                        echo "<tr class='clickable-row firstrow   font ' id='1tr" . $index . "'>" .

                                            "<td scope='row'>" . ($index + 1) . "</td>" .

                                            "<td> <i id = 'speak" .  $index . "'class = 'fa fa-volume-up spkicn fa-lg speaker unselectable '> </i></td>" .

                                            "<td scope = 'row' > " . $value['word'] . " </td>" .

                                            "<td scope = 'row' > " . $pro . " </td>" .

                                            "<td> " . $value['meaning'] . " </td>" .

                                            "<td><div class = 'dropdown' >" .
                                            "<button class = 'edit' > <i class = 'fas fa-edit' > </i></i> </button> " .
                                            "<div class = 'dropdown-content btn-group'>" .
                                            "<button class = 'hvr-grow grammer'id = 'grmr" .  $index . "' > <i class = 'fas fa-info-circle' > Grammer </i></button> " .
                                            "<button disabled class = 'hvr-grow Favorite bd3'id = 'fvrt" .  $index . "' > <i class = 'fa fa-heart' > </i> Favorite </button>" .
                                            "<button disabled class = 'hvr-grow bd2' id = 'updt" .  $index . "'><i class = 'fa fa-exchange-alt'aria -hidden='true'> Replace </i></button>" . "<button disabled class = 'hvr-grow bd1' id = 'rmve" .  $index . "'> <i class = 'fa fa-trash' > Remove </i></button>" .
                                            "</div> </div> </td> </tr> " .

                                            "<tr class = 'secondrow ' id = '2tr" .  $index . "'> <td colspan = '5' ><div class = 'overflow'  id = 'div" .  $index . "' > </div> </td> </tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="sidebar">

                <?php include("include/sidebar.php"); ?>

            </div>
            <!--sidebar-->
        </div>
        <!--responsive-->

        <!--end table-->



    </main>
    <?php
    include('include/footer.php');
    ?>

</body>

</html>
>

<script type="text/javascript">
    // var getUrl = window.location;
    // var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    // alert(baseUrl);
    "use strict";
    $(document).ready(function() {
        // $.ajax({
        //     url: "loading.php?search=vocabulary%20with%20D",
        //     type: "GET",
        //     success: function(load_data) {
        //         $.each(load_data, function(index, value) {
        //             $("#my_table").append(

        //             ); //end sucess
        //         }); //end each
        $('#search').keyup(function() {
            search_table($(this).val());
        });

        function search_table(value) {
            $('#my_table tr').each(function() {
                var found = 'false';
                $(this).each(function() {

                    if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
                        found = 'true';
                    }

                });
                if (found == 'true') {
                    $(this).show();
                    $('.secondrow').hide();


                } else {
                    $(this).hide();
                }

            });
        }


        $('.speaker').click(function() {
            $.getJSON("https://api.dictionaryapi.dev/api/v2/entries/en_US/" + $.trim($('#1tr' + this.id.slice(5)).find(" td:nth-child(3)").text()), function(data) {
                $.map(data, function(value) {
                    var audio = new Audio($.trim(value.phonetics[0].audio)).play();
                }); //end map
            }); //end getjson
        }); //end speaker


        function speak(obj) {
            $().articulate('rate', 0.8);
            $(obj).articulate('speak');
        } //end speack

        $('.grammer').click(function() {
            var index = this.id.slice(4);

            $().articulate('resume');
            var link = $.trim("https://api.dictionaryapi.dev/api/v2/entries/en_US/" + $('#1tr' + index).find("td:nth-child(3)").text());

            $.getJSON(link, function(value) {
                $('#2tr' + index).slideDown();
                $('#div' + index).empty();
                $('#div' + index).append('<div class="closeContainer"> <i id ="close' + index + '" class = "fa fa-times close"> </i></div > ').append('<div class="jvalue" style="text-align:center";>  <b> Grammer  </b> </div>'); //end append

                var idty = 1;
                for (let x in value) { //word
                    $('#div' + index).append('<div class="jhead"><i  id="' + index + 'w' + idty + '" class="fa fa-volume-up spkicn fa-lg speaker"></i> Word</div><div class="jvalue" id ="' + index + 'w' + idty + 'p' + '">' + value[x].word + '</div >');
                    idty = idty + 1;
                    //end for word

                    for (let x2 in value[x].phonetics) { //text 
                        $('#div' + index).append('<div class="jhead"><i  id="' + index + 't' + idty + '" class="fa fa-volume-up spkicn fa-lg text"></i> Text </div>' + '<div class="jvalue" id ="' + index + 't' + idty + 'p' + '" >' + value[x].phonetics[x2].text + '</div>');
                        //end text
                        $('#' + index + 't' + idty).click(function() {
                            const audio = new Audio($.trim(value[x].phonetics[x2].audio)).play();
                        });
                        idty = idty + 1;

                    } //end for (x2 in value[x].phonetics) 


                    for (let x3 in value[x].meanings) { //part of speech
                        $('#div' + index).append('<div class="jhead"><i  id="' + index + 'p' + idty + '" class="fa fa-volume-up spkicn fa-lg speaker"></i> PartOfSpeech</div>' + '<div class="jvalue" id ="' + index + 'p' + idty + 'p' + '">' + value[x].meanings[x3].partOfSpeech + '</div >');
                        idty = idty + 1;

                        //end for partofspeech

                        for (let x4 in value[x].meanings[x3].definitions) {
                            for (let x5 in value[x].meanings[x3].definitions[x4]) {
                                $('#div' + index).append(('<div class="jhead"><i  id=' + idty + x5 + index + ' class="fa fa-volume-up spkicn fa-lg speaker"></i>' + '  ' + x5 + ' </div>' + '<div class="jvalue" id ="' + idty + x5 + index + 'p' + '">' + value[x].meanings[x3].definitions[x4][x5] + '</div>').replace(/\,/g, ', '));
                                idty = idty + 1;
                            }
                        } //end 2 loop def ex sy 

                        $('#div' + index).append('<hr>');
                        $('hr').addClass('solid');


                    } //end meaning loop
                } // end  for(x in valule)

                $('.speaker').click(function() {
                    speak('#' + this.id + 'p');
                });

                $('#close' + index).click(function() {
                    $('#2tr' + index).fadeOut();

                });

                $('#close' + index).click(function() {
                    $('#2tr' + index).fadeOut();
                    $().articulate('stop');
                });


            }); //get json
        }); //end after click  grammerr func

        // } //end sucess
        // }); // end grammer ajax func



        // bounce
        $(function() {
            $('#len1').toggleClass('bounce');
        }, 300)
        // end bounce

    }); //end  ready func



    // top button
    let mybutton = document.getElementById("myBtn");
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    //end top button
</script>