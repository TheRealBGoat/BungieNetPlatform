<?php

$paramDetails = array(
	'membershipType' => array('enum' => 'BungieMembershipType', 'type' => 'string', 'desc' => 'A valid Bungie.net membershipType.'),
	'invitationResponseState' => array('enum' => 'InvitationResponseState', 'string' => 'integer', 'desc' => 'How to respond to the invitation.'),
	'count' => array('type' => 'integer', 'desc' => 'Number of rows to return.'),
	'tpage' => array('type' => 'integer', 'desc' => 'Page number to return, starting with 0.'),
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
	'mode' => array('enum' => 'DestinyActivityModeType', 'type' => 'string', 'desc' => 'Filter by ActivityModeType.'),
	'modes' => array('enum' => 'DestinyActivityModeType', 'type' => 'string', 'desc' => 'Filter by ActivityModeType.'),
	'direction' => array('enum' => 'DestinyExplorerOrderDirection', 'type' => 'string', 'desc' => 'Order to sort items: Ascending or Descending'),
	'order' => array('enum' => 'DestinyExplorerOrderBy', 'type' => 'string', 'desc' => 'Item property used for sorting'),
	'orderstathash' => array('type' => 'integer', 'desc' => 'This value is used when the order parameter is set to ItemStatHash. The item stat for the provided hash value will be used in the sort.'),
	'rarity' => array('enum' => 'TierType', 'type' => 'string', 'desc' => 'Rarity of items to return. Omit for all items.'),
	'step' => array('type' => 'integer', 'desc' => 'Hash ID of the talent node step that an item must have in order to be returned.'),
	'guardianAttributes' => array('enum' => 'DestinyTalentNodeStepGuardianAttributes', 'type' => 'string', 'desc' => 'Items must have node steps in one of these categories, omit for all items.'),
	'impactEffects' => array('enum' => 'DestinyTalentNodeStepImpactEffects', 'type' => 'string', 'desc' => 'Items must have node steps in one of these categories, omit for all items.'),
	'damageTypes' => array('enum' => 'DestinyTalentNodeStepDamageTypes', 'type' => 'string', 'desc' => 'Items must have node steps in one of these categories, omit for all items.'),
	'weaponPerformance' => array('enum' => 'DestinyTalentNodeStepWeaponPerformances', 'type' => 'string', 'desc' => 'Items must have node steps in one of these categories, omit for all items.'),
	'lightAbilities' => array('enum' => 'DestinyTalentNodeStepLightAbilities', 'type' => 'string', 'desc' => 'Items must have node steps in one of these categories, omit for all items.'),
	'sourcecat' => array('enum' => 'DestinyRewardSourceCategory', 'type' => 'string', 'desc' => 'Items must drop from the specified source category, omit for all items.'),
	'sourcehash' => array('type' => 'integer', 'desc' => 'Items must drop from the specified source, omit for all items. Overrides sourcecat.'),
	'name' => array('type' => 'string', 'desc' => 'Name of items to return (partial match, no case). Omit for all items.'),
	'matchrandomsteps' => array('type' => 'boolean', 'desc' => 'True if the supplied groups/step hash filters should match random node steps. False indicates the item can always get the step before it is considered a match.'),
	'groups' => array('enum' => 'DestinyStatsGroupType', 'type' => 'string', 'desc' => 'Group of stats to include, otherwise only general stats are returned.'),
	'periodType' => array('enum' => 'PeriodType', 'type' => 'string', 'desc' => 'Indicates a specific period type to return. Optional.'),
	'monthstart' => array('type' => 'string', 'desc' => 'First month to return when monthly stats are requested. Use the format YYYY-MM.'),
	'monthend' => array('type' => 'string', 'desc' => 'Last month to return when monthly stats are requested. Use the format YYYY-MM.'),
	'daystart' => array('type' => 'string', 'desc' => 'First day to return when daily stats are requested. Use the format YYYY-MM-DD'),
	'dayend' => array('type' => 'string', 'desc' => 'Last day to return when daily stats are requested. Use the format YYYY-MM-DD')


);

function buildAndSaveConfig($swaggerFiles) {
	$config = new stdClass();
	$config->oauth2RedirectUrl = 'https://therealbgoat.github.io/BungieNetPlatform/swagger/';
	$config->dom_id = '#swagger-ui';
	$config->displayOperationId = true;
	$config->showRequestHeaders = true;
	$config->presets = array('SwaggerUIBundle.presets.apis, SwaggerUIStandalonePreset');
	$config->plugins = array('SwaggerUIBundle.plugins.DownloadUrl');
	$config->layout = 'StandaloneLayout';
	$config->urls = $swaggerFiles;
	$config->{'urls.primaryName'} = 'DestinyService';

	file_put_contents(BUILDERPATH.'/config/swagger-config.json', str_replace(['\/'], ['/'], json_encode($config, JSON_PRETTY_PRINT)));
}

function buildInfo($desc) {
	$contact = new stdClass();
	$contact->name = '/r/DestinyTheGame';
	$contact->email = 'fake@email.com';

	$license = new stdClass();
	$license->name = 'MIT';
	$license->url = 'http://opensource.org/licenses/MIT';

	$info = new stdClass();
	$info->description = $desc;
	$info->version = '1.0.0';
	$info->title = 'BungieNetPlatform API Swagger';
	$info->contact = $contact;
	$info->license = $license;

	return $info;
}

function buildSecurityDefinitions() {
	$security = new stdClass();

	// Setup Bungie OAuth security definition
	$oauth = new stdClass();
	$oauth->type = 'oauth2';
	$oauth->authorizationUrl = 'https://www.bungie.net/en/OAuth/Authorize';
	$oauth->tokenUrl = 'https://www.bungie.net/platform/app/oauth/token/';
	$oauth->flow = 'accessCode';

	$scopes = new stdClass();
	// $scopes->{'ReadBasicUserProfile'} = "Read user profile information such as the user's handle, Xbox and PSN account names, and Destiny characters.";
	// $scopes->{'MoveEquipDestinyItems'} = "Move or equip Destiny items";
	// $scopes->{'ReadDestinyInventoryAndVault'} = "Read user's Destiny vault and character inventory.";
	// $scopes->{'ReadUserData'} = "Read user data such as web notifications, clan/group memberships, recent activity, and muted users.";
	// $scopes->{'ReadDestinyVendorsAndAdvisors'} = "Access vendor and advisor data specific to a user.";

	$oauth->scopes = $scopes;

	$security->BungieAuth = $oauth;

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

		if ($details['type'] === 'boolean') {
			$param->default = false;
		}

		// The platform-lib does not specify which parameters are required, but
		// we can assume a path parameter is always required
		if ($paramType === 'path') {
			$param->required = true;
		}

		// For now, set all QS parameters to allow empty values until
		// we can map which ones are truly required
		// if ($paramType === 'query') {
		// 	$param->required = false;
		// 	$param->allowEmptyValue = true;
		// }


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

$swaggerFiles = array();

// Loop through each of the different API service groups and create a swagger
// spec for each and add that spec to the swagger config
foreach ($endpoints as $service) {
	$serviceName = $service->name;

	// Only include the DestinyService endpoints right now
	if ($serviceName !== 'DestinyService') continue;

	$serviceEndpoints = get_object_vars($service->endpoints);

	usort($serviceEndpoints, function($a, $b) {
		return strcasecmp($a->name, $b->name);
	});

	$serviceCount = count($serviceEndpoints);

	$apis[$service->name] = array();
	$operationIds[] = array();

	$paths = new stdClass();

	// For this particular API service group, loop through all of it's endpoints
	foreach ($serviceEndpoints as $endpoint) {
		$operationId = $endpoint->name;

		$noLeadingSlash = substr($endpoint->endpoint, 1);
		$nextSlashIdx = strpos($noLeadingSlash, '/');
		$truncated = substr($noLeadingSlash, $nextSlashIdx + 1);

		// TODO - make this work for all services by stripping "Service" from the name
		$externalDocUrl = 'https://www.bungie.net/platform/destiny/help/HelpDetail/'.$endpoint->method.'?uri='.urlencode($truncated);

		//var_dump('ExternalDocUrl: '.$externalDocUrl);
		// Fetch the external doc page and parse to see if login is required
		$ch = curl_init($externalDocUrl);
		curl_setopt_array($ch, array(
			CURLOPT_RETURNTRANSFER => true
		));
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$externalDocData = curl_exec($ch);
		curl_close($ch);

		// /<b>Requires Sign-in: <\/b>\n\s*<span class=\"method\">(true|false)/
		preg_match_all("/<b>Requires Sign-in: <\/b>\s*<span class=\"method\">(true|false)/",
			$externalDocData,
			$matches);

		$loginRequired = 'false';

		if (isset($matches[1][0])) {
			$loginRequired = $matches[1][0];
		}

		//var_dump((string)$externalDocData);
		//var_dump($matches[1][0]);

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

		// $externalDocs = new stdClass();
		// $externalDocs->description = '';
		// $externalDocs->url = $externalDocUrl;

		// $opDetails->externalDocs = $externalDocs;

		if ($loginRequired === 'true') {
			$opDetails->security[] = array('BungieAuth' => array());
		}

		$op = array(strtolower($endpoint->method) => $opDetails);

		// Build up the Path
		$paths->{$endpoint->endpoint} = $op;
	}

	$swagger = new stdClass();
	$swagger->swagger = '2.0';
	$swagger->info = buildInfo('Swagger documenation and interactive testing for all '.$serviceName.' endpoints in the BungieNetPlatform');
	$swagger->schemes = array('https');
	$swagger->securityDefinitions = buildSecurityDefinitions();
	$swagger->host = 'www.bungie.net';
	$swagger->basePath = '/Platform';
	$swagger->paths = $paths;

	$filename = strtolower($serviceName);
	$swaggerUrl = new stdClass();
	$swaggerUrl->name = $serviceName;
	$swaggerUrl->url = 'https://raw.githubusercontent.com/TheRealBGoat/BungieNetPlatform/swagger-builder/wiki-builder/data/swagger/'.$filename;

	$swaggerFiles[] = $swaggerUrl;
	buildAndSaveConfig($swaggerFiles);

	echo str_replace(['\/'], ['/'], json_encode($swagger, JSON_PRETTY_PRINT)) . "\n";
	file_put_contents(BUILDERPATH.'/data/swagger/'.$filename.'-swagger.json', str_replace(['\/'], ['/'], json_encode($swagger, JSON_PRETTY_PRINT)));
}
