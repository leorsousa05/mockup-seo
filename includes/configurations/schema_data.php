<?php

$url = "";
$description = "";
$logo_location = "";
$phone_number = "";
$website_name = "";
$address = "";

?>


<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "Organization",
		"url": "<?=$url?>",
		"logo": "<?=$logo_location?>",
		"description": "<?=$description?>",
		"contactPoint" : [{
			"@type" : "ContactPoint",
			"telephone" : "+55<?=$phone_number?>",
			"contactType" : "customer service"
		}],

		"location" : {
			"@type" : "Place",
			"name" : "<?=$website_name?>",
			"address" : "<?=$address?>"
		}

	}
</script>
