<?php

$paramDetails = array(
	'membershipType' => array('enum' => 'BungieMembershipType', 'type' => 'string', 'desc' => 'A valid Bungie.net membershipType.'),
	'invitationResponseState' => array('enum' => 'InvitationResponseState', 'string' => 'integer', 'desc' => 'How to respond to the invitation.'),
	'page' => array('type' => 'integer', 'desc' => 'The current page to return. Starts at 1.'),
	'currentPage' => array('type' => 'integer', 'desc' => 'The current page to return. Starts at 1.'),
	'currentpage' => array('type' => 'integer', 'desc' => 'The current page to return. Starts at 1.'),
	//'itemsPerPage' => array('desc' => 'Items per page. Default is 10.'),
	//'itemsperpage' => array('desc' => 'Items per page. Default is 10.'),
	'groupId' => array('type' => 'integer', 'desc' => 'A valid groupId.'),
	'groupMembershipType' => array('type' => 'integer', 'desc' => 'A valid group membershipType. 0=Member, 1=Admin, 2=Founder (probably will throw an error)'),
	'clanMembershipType' => array('enum' => 'BungieMembershipType', 'type' => 'string', 'desc' => 'A valid clan membership type. 1=Xbox, 2=PSN, 10=Demon'),
	'ignoredItemType' => array('enum' => 'IgnoredItemType', 'type' => 'string', 'desc' => 'The type of item to ignore.'),
	'ignoredItemId' => array('type' => 'integer', 'desc' => 'A valid ignoredItemId.'),
	'destinyMembershipId' => array('type' => 'integer', 'desc' => 'A valid destinyMembershipId.'),
	'accountId' => array('type' => 'integer', 'desc' => 'A valid destinyMembershipId.'),
	'characterId' => array('type' => 'integer', 'desc' => 'A valid characterId that is associated with the given account.'),
	'definitions' => array('type' => 'boolean', 'desc' => 'Include definitions in the response. Use while testing.'),
	'definitionType' => array('type' => 'integer', 'enum' => 'DestinyDefinitionType', 'desc' => 'The type of definition to return.'),
	'definitionId' => array('type' => 'integer', 'desc' => 'A valid definitionId.'),

	'partnershipType' => array('enum' => 'PartnershipType', 'type' => 'string', 'desc' => 'The type of partnership. 0=None, 1=Twitch'),
	'communityStatusSort' => array('enum' => 'CommunityStatusSort', 'type' => 'string', 'desc' => 'Sort by status.'),
	'modeHash' => array('enum' => 'DestinyActivityModeType', 'type' => 'string', 'desc' => 'Filter by ActivityModeType.')
);

function buildInfo() {
	$contact = new stdClass();
	$contact->name = '/r/DestinyTheGame';
	$contact->email = 'fake@email.com';

	$license = new stdClass();
	$license->name = 'MIT';
	$license->url = 'http://opensource.org/licenses/MIT';

	$info = new stdClass();
	$info->description = 'Swagger documentation for all API endpoints within the BungieNetPlatform.';
	$info->version = '1.0.0';
	$info->title = 'BungieNetPlatform API Swagger';
	$info->contact = $contact;
	$info->license = $license;

	return $info;
}

function buildSecurityDefinitions() {
	$security = new stdClass();

	$header = new stdClass();
	$header->type = 'apiKey';
	$header->in = 'header';
	$header->name = 'X-API-Key';

	$security->APIKeyHeader = $header;

	return $security;
}

function buildParam($name, $paramType, $enums) {
	global $paramDetails;

	$param = new stdClass();

	if (isset($paramDetails[$name])) {
		$details = $paramDetails[$name];

		$param = new stdClass();
		$param->in = $paramType;
		$param->name = $name;
		$param->description = $details['desc'];

		// The platform-lib does not specify which parameters are required, but
		// we can assume a path parameter is always required
		if ($paramType === 'path') {
			$param->required = true;
		}


		if (isset($details['enum'])) {
			$enumName = $details['enum'];

			$param->type = 'array';

			$items = new stdClass();
			$items->type = 'string';
			$items->enum = array_keys($enums[$enumName]);

			$param->items = $items;
		} else {
			$param->type = $details['type'];
		}
	} else {
		// If there are no details about a parameter, we probably don't know
		// the type either, so fall back to string
		$param->name = $name;
		$param->in = $paramType;
		$param->description = '';
		$param->type = 'string';

		if ($paramType === 'path') {
			$param->required = true;
		}
	}

	return $param;
}

function buildPostParam($params, $enums) {
	global $paramDetails;

	$param = new stdClass();
	$param->in = 'body';
	$param->name = 'body';
	$param->description = 'Object to be posted';
	$param->required = true;

	$schema = new stdClass();
	$schema->type = 'object';

	$props = new stdClass();

	foreach ($params as $postParam) {
		$prop = new stdClass();

		if (isset($paramDetails[$postParam])) {
			$details = $paramDetails[$postParam];

			$prop->type = 'string';
			$prop->description = $details['desc'];
			$props->{$postParam} = $prop;
		} else {
			$prop->type = 'string';
			$props->{$postParam} = $prop;
		}
	}

	$schema->properties = $props;
	$param->schema = $schema;

	return $param;
}

// Build Enums
$enumsPath = BUILDERPATH.'/data/enums.json';
$enums = file_exists($enumsPath) ? json_decode(file_get_contents($enumsPath), true) : array();

// Build Endpoints
$endpointsPath = BUILDERPATH.'/data/endpoints.json';
$endpoints = file_exists($endpointsPath) ? json_decode(file_get_contents($endpointsPath)) : array();

$paths = new stdClass();

// Loop through each of the different API service groups
foreach ($endpoints as $service) {
	$serviceEndpoints = get_object_vars($service->endpoints);

	usort($serviceEndpoints, function($a, $b) {
		return strcasecmp($a->name, $b->name);
	});

	$serviceCount = count($serviceEndpoints);

	$apis[$service->name] = array();
	$operationIds[] = array();

	// For this particular API service group, loop through all of it's endpoints
	foreach ($serviceEndpoints as $endpoint) {
		$operationId = $endpoint->name;

		if (in_array($operationId, $operationIds)) {
			$operationId .= $service->name;
		}

		$operationIds[] = $operationId;

		// Start by looking for path parameters
		preg_match_all('/\{([^\}]+)\}/', $endpoint->endpoint, $pathParams, PREG_SET_ORDER);

		$params = array();

		// If there are any path params, build those up
		if (count($pathParams) > 0) {
			foreach ($pathParams as $param) {
				$params[] = buildParam($param[1], 'path', $enums);
			}
		}

		// Build query string parameters
		if (count($endpoint->params) > 0) {
			foreach ($endpoint->params as $param) {
				$params[] = buildParam($param, 'query', $enums);
			}
		}

		// Build body parameters
		if (count($endpoint->post) > 0) {
			$params[] = buildPostParam($endpoint->post, $enums);
		}

		$responses = new stdClass();

		$successResponse = new StdClass();
		$successResponse->description = 'Successful operation';
		$responses->{'200'} = $successResponse;


		// Build up the Operation
		$opDetails = new stdClass();
		$opDetails->tags = array($service->name);
		$opDetails->operationId = $operationId;
		$opDetails->produces = array('application/json');
		$opDetails->parameters = $params;
		$opDetails->responses = $responses;

		$op = array(strtolower($endpoint->method) => $opDetails);

		// Build up the Path
		$paths->{$endpoint->endpoint} = $op;
	}
}

$swagger = new stdClass();
$swagger->swagger = '2.0';
$swagger->info = buildInfo();
$swagger->securityDefinitions = buildSecurityDefinitions();
$swagger->security = array();
$swagger->security[] = array('APIKeyHeader' => array());
$swagger->host = 'https://crossorigin.me/www.bungie.net';
$swagger->basePath = '/BungieNetPlatform';
$swagger->paths = $paths;

//echo str_replace(['\/'], ['/'], json_encode($swagger, JSON_PRETTY_PRINT)) . "\n";
file_put_contents(BUILDERPATH.'/data/swagger.json', str_replace(['\/'], ['/'], json_encode($swagger, JSON_PRETTY_PRINT)));
