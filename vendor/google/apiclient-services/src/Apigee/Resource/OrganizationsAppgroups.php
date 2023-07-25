<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Apigee\Resource;

use Google\Service\Apigee\GoogleCloudApigeeV1AppGroup;
use Google\Service\Apigee\GoogleCloudApigeeV1ListAppGroupsResponse;

/**
 * The "appgroups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google\Service\Apigee(...);
 *   $appgroups = $apigeeService->organizations_appgroups;
 *  </code>
 */
class OrganizationsAppgroups extends \Google\Service\Resource
{
  /**
   * Creates an AppGroup. Once created, user can register apps under the AppGroup
   * to obtain secret key and password. At creation time, the AppGroup's state is
   * set as `active`. The attribute `Attribute` with key `attribute_name` as
   * `__apigee_reserved__developer_details` can be used to store developers and
   * their roles. The JSON format expected is: [ { "developer_id":"", "roles":[ ""
   * ] } ] and is dealt in base64encoded format. Etag will be available in
   * attribute `Attribute` with key `attribute_name` as
   * `__apigee_reserved__developer_details_etag` for that AppGroup.
   * (appgroups.create)
   *
   * @param string $parent Required. Name of the Apigee organization in which the
   * AppGroup is created. Use the following structure in your request:
   * `organizations/{org}`.
   * @param GoogleCloudApigeeV1AppGroup $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1AppGroup
   */
  public function create($parent, GoogleCloudApigeeV1AppGroup $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudApigeeV1AppGroup::class);
  }
  /**
   * Deletes an AppGroup. All app and API keys associations with the AppGroup are
   * also removed. **Warning**: This API will permanently delete the AppGroup and
   * related artifacts. **Note**: The delete operation is asynchronous. The
   * AppGroup app is deleted immediately, but its associated resources, such as
   * apps and API keys, may take anywhere from a few seconds to a few minutes to
   * be deleted. (appgroups.delete)
   *
   * @param string $name Required. Name of the AppGroup. Use the following
   * structure in your request: `organizations/{org}/appgroups/{app_group_name}`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1AppGroup
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleCloudApigeeV1AppGroup::class);
  }
  /**
   * Returns the AppGroup details for the provided AppGroup name in the request
   * URI. (appgroups.get)
   *
   * @param string $name Required. Name of the AppGroup. Use the following
   * structure in your request: `organizations/{org}/appgroups/{app_group_name}`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudApigeeV1AppGroup
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudApigeeV1AppGroup::class);
  }
  /**
   * Lists all AppGroups in an organization. A maximum of 1000 AppGroups are
   * returned in the response if PageSize is not specified, or if the PageSize is
   * greater than 1000. (appgroups.listOrganizationsAppgroups)
   *
   * @param string $parent Required. Name of the Apigee organization. Use the
   * following structure in your request: `organizations/{org}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter The filter expression to be used to get the list of
   * AppGroups, where filtering can be done on name, correlationID or channelID of
   * the app group. Example: filter = "name = foobar"
   * @opt_param int pageSize Count of AppGroups a single page can have in the
   * response. If unspecified, at most 1000 AppGroups will be returned. The
   * maximum value is 1000; values above 1000 will be coerced to 1000.
   * @opt_param string pageToken The starting index record for listing the
   * AppGroups.
   * @return GoogleCloudApigeeV1ListAppGroupsResponse
   */
  public function listOrganizationsAppgroups($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudApigeeV1ListAppGroupsResponse::class);
  }
  /**
   * Updates an appGroup. This API replaces the existing appGroup details with
   * those specified in the request. Include or exclude any existing details that
   * you want to retain or delete, respectively. Note that the state of the
   * AppGroup should be updated using `action`, and not via AppGroup. The custom
   * attribute limit is 1000, and is how `__apigee_reserved__developer_details`
   * can be updated. **Note**: OAuth access tokens and Key Management Service
   * (KMS) entities (apps, developers, and API products) are cached for 180
   * seconds (current default). Any custom attributes associated with these
   * entities are cached for at least 180 seconds after the entity is accessed at
   * runtime. Therefore, an `ExpiresIn` element on the OAuthV2 policy won't be
   * able to expire an access token in less than 180 seconds. (appgroups.update)
   *
   * @param string $name Required. Name of the AppGroup. Use the following
   * structure in your request: `organizations/{org}/appgroups/{app_group_name}`
   * @param GoogleCloudApigeeV1AppGroup $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string action Activate or de-activate the appGroup by setting the
   * action as `active` or `inactive`. The `Content-Type` header must be set to
   * `application/octet-stream`, with empty body.
   * @return GoogleCloudApigeeV1AppGroup
   */
  public function update($name, GoogleCloudApigeeV1AppGroup $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], GoogleCloudApigeeV1AppGroup::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsAppgroups::class, 'Google_Service_Apigee_Resource_OrganizationsAppgroups');
