<html>
<head>

</head>

<body>
<select size="1" id="Rank" title="" name="Rank">
    <option value="">-Select Your Rank-</option>
    <option value="airman">Airman</option>
    <option value="senior-airman">Senior Airman</option>
</select>

<div class="container">
    <div class="airman">
        <select class="second-level-select">
            <option value="">-Select Your Rank-</option>
            <option value="basic-ore-1">Basic Ore Miner - Level 1</option>
            <option value="basic-ore-2">Basic Ore Miner - Level 2</option>
        </select>
    </div>
    <div class="senior-airman">
        <select class="second-level-select">
            <option value="">-Select Your Rank-</option>
            <option value="omber-miner-1">Omber Miner - Level 1</option>
            <option value="omber-miner-2">Omber Miner - Level 2</option>
        </select>
    </div>
</div>

<div class="second-level-container">
    <div class="basic-ore-1">
        Line of text for basic ore miner 1
    </div>
    <div class="basic-ore-2">
        Line of text for basic ore miner 2
    </div>
    <div class="omber-miner-1">
        Line of text for omber miner 1
    </div>
    <div class="omber-miner-2">
        Line of text for omber miner 2
    </div>
</div>
</body>
    <script type="text/javascript" src="resources/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="resources/js/materialize.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
    $('#Rank').bind('change', function() {
        var elements = $('div.container').children().hide(); // hide all the elements
        var value = $(this).val();

        if (value.length) { // if somethings' selected
            elements.filter('.' + value).show(); // show the ones we want
        }
    }).trigger('change');

    $('.second-level-select').bind('change', function() {
        var elements = $('div.second-level-container').children().hide(); // hide all the elements
        var value = $(this).val();

        if (value.length) { // if somethings' selected
            elements.filter('.' + value).show(); // show the ones we want
        }
    }).trigger('change');
});
</script>
</html>