<?PHP
$l=mysqli_connect("34.224.83.184","student2","phppass2","student2");
if (!empty($_GET['SearchTerm']))
{
    $query="select * from users where familyName like '%$_GET[SearchTerm]%' or givenName like '%$_GET[SearchTerm]%' order by familyName";
}
$r = mysqli_query($l,$query);
echo "<table border=1 cellpadding=10 >";
echo "<tr><th>ID</th><th>userName</th><th>externalId</th><th>created</th><th>dataSourceId</th><th>available</th><th>givenName</th><th>familyName</th></tr>";
while ($row = mysqli_fetch_array($r)) {
    echo "<tr>";
    echo "<td>$row[id]</td>";
    echo "<td>$row[userName]</td>";
    echo "<td>$row[externalID]</td>";
    echo "<td>$row[created]</td>";
    echo "<td>$row[dataSourceID]</td>";
    echo "<td>$row[available]</td>";
    echo "<td>$row[givenName]</td>";
    echo "<td>$row[familyName]</td>";
    echo "</tr>";
}
echo "</table>";
?>

<html>
<head>
<link href="https://code.jquery.com/ui/jquery-ui-git.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-git.js"></script>
<script src="https://code.jquery.com/ui/jquery-ui-git.js"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
</head>
<body>

<?PHP
    $query = "select distinct givenName from users order by 1";
    $r=mysqli_query($l,$query);
echo "<form action=jqueryhw.php method=GET >";
echo "<select id=combobox name=SearchTerm>";

            echo "<option selected> </option>";
while($row = mysqli_fetch_array($r))
                {
                        echo "<option>$row[givenName]</option>";
                }

$query = "select distinct familyName from users order by 1";
    $r=mysqli_query($l,$query);

    while($row = mysqli_fetch_array($r))
                {
                        echo "<option>$row[familyName]</option>";
                }

echo "</select>";
echo "<input type=submit value=Search />";
echo "</form>";
?>

<script>
  $( function() {
    $.widget( "custom.combobox", {
      _create: function() {
        this.wrapper = $( "<span>" )
          .addClass( "custom-combobox" )
          .insertAfter( this.element );

        this.element.hide();
        this._createAutocomplete();
        this._createShowAllButton();
      },

      _createAutocomplete: function() {
        var selected = this.element.children( ":selected" ),
          value = selected.val() ? selected.text() : "";

        this.input = $( "<input>" )
          .appendTo( this.wrapper )
          .val( value )
          .attr( "title", "" )
          .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
          .autocomplete({
            delay: 0,
            minLength: 0,
            source: $.proxy( this, "_source" )
          })
          .tooltip({
            classes: {
              "ui-tooltip": "ui-state-highlight"
            }
          });

        this._on( this.input, {
          autocompleteselect: function( event, ui ) {
            ui.item.option.selected = true;
            this._trigger( "select", event, {
              item: ui.item.option
            });
          },

          //autocompletechange: "_removeIfInvalid"
        });
      },

      _createShowAllButton: function() {
        var input = this.input,
          wasOpen = false;

        $( "<a>" )
          .attr( "tabIndex", -1 )
          .attr( "title", "Show All Items" )
          .tooltip()
          .appendTo( this.wrapper )
          .button({
            icons: {
              primary: "ui-icon-triangle-1-s"
            },
            text: false
          })
          .removeClass( "ui-corner-all" )
          .addClass( "custom-combobox-toggle ui-corner-right" )
          .on( "mousedown", function() {
            wasOpen = input.autocomplete( "widget" ).is( ":visible" );
          })
          .on( "click", function() {
            input.trigger( "focus" );

            // Close if already visible
            if ( wasOpen ) {
              return;
            }

            // Pass empty string as value to search for, displaying all results
            input.autocomplete( "search", "" );
          });
      },

      _source: function( request, response ) {
        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
        response( this.element.children( "option" ).map(function() {
          var text = $( this ).text();
          if ( this.value && ( !request.term || matcher.test(text) ) )
            return {
              label: text,
              value: text,
              option: this
            };
        }) );
      },

      _removeIfInvalid: function( event, ui ) {

        // Selected an item, nothing to do
        if ( ui.item ) {
          return;
        }

        // Search for matches
        var value = this.input.val(),
          valueLowerCase = value.toLowerCase(),
          valid = false;
        this.element.children( "option" ).each(function() {
          if ( $( this ).text().toLowerCase() === valueLowerCase ) {
            this.selected = valid = true;
            return false;
          }
        });


        if ( valid ) {
          return;
        }


        this.input
          .val( "" )
          .attr( "title", value + " didn't match any item" )
          .tooltip( "open" );
        this.element.val( "" );
        this._delay(function() {
          this.input.tooltip( "close" ).attr( "title", "" );
        }, 2500 );
        this.input.autocomplete( "instance" ).term = "";
      },

      _destroy: function() {
        this.wrapper.remove();
        this.element.show();
      }
    });

    $( "#combobox" ).combobox();
    $( "#toggle" ).on( "click", function() {
      $( "#combobox" ).toggle();
    });
  }
  );
</script>
</body>
</html>