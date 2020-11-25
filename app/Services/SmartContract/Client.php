<?php

namespace App\Services\SmartContract;

class Client extends BaseContractClient
{
  const ALCHEMIST_BASE = '/contracts/alchemist';
  const SEEKER_BASE = '/contracts/seeker';

  const CREATE_ALCHEMIST_ENDPOINT = '/methods/createAlchemist';
  const CREATE_SEEKER_ENDPOINT = '/methods/createSeeker';

  const AWARD_RP_ENDPOINT = '/methods/awardRP';
  const AWARD_SBP_ENDPOINT = '/methods/awardSBP';

  const REVOKE_RP_ENDPOINT = '/methods/revokeRP';
  const REVOKE_SBP_ENDPOINT = '/methods/revokeSBP';

  const REDEEM_RP_ENDPOINT = '/methods/redeemRP';
  const REDEEM_SBP_ENDPOINT = '/methods/redeemSBP';

  const GET_ALCHEMIST_BY_ID_ENDPOINT = '/methods/getAlchemistByID';
  const GET_SEEKER_BY_ID_ENDPOINT = '/methods/getSeekerByID';

  protected function getAlchemistEndpoint($endpoint)
  {
    return config('smartcontract.api.alchemist_contract').self::ALCHEMIST_BASE.$endpoint;
  }

  protected function getSeekerEndpoint($endpoint) {
    return config('smartcontract.api.seeker_contract').self::SEEKER_BASE.$endpoint;
  }

  /**
   * [Create Alchemist]
   * @param $alchemistId
   * @return mixed|string
   */
  public function createAlchemist($alchemistId)
  {
    $endpoint = $this->getAlchemistEndpoint(self::CREATE_ALCHEMIST_ENDPOINT);
    $args = [$alchemistId];
    $response = $this->request(parent::METHOD_POST, $endpoint, $args);

    return $response;
  }

  /**
   * [Create Alchemist]
   * @param $alchemistId
   * @return mixed|string
   */
  public function createSeeker($seekerId)
  {
    $endpoint = $this->getSeekerEndpoint(self::CREATE_SEEKER_ENDPOINT);
    $args = [$seekerId];
    $response = $this->request(parent::METHOD_POST, $endpoint, $args);

    return $response;
  }

  /**
   * [Award ReputationPoints to an alchemist]
   * @param $alchemistId
   * @param $amount
   * @return mixed|string
   */
  public function awardRP($id, $amount, $type = 'alchemist')
  {
    $endpoint = $this->getAlchemistEndpoint(self::AWARD_RP_ENDPOINT);
    if ($type == 'seeker') {
      $endpoint = $this->getSeekerEndpoint(self::AWARD_RP_ENDPOINT);
    }
    $args = [$id, $amount];
    $response = $this->request(parent::METHOD_POST, $endpoint, $args);

    return $response;
  }

  /**
   * [Award SkillBasedPoints to an alchemist]
   * @param $alchemistId
   * @param $amount
   * @return mixed|string
   */
  public function awardSBP($id, $amount, $type = 'alchemist')
  {
    $endpoint = $this->getAlchemistEndpoint(self::AWARD_SBP_ENDPOINT);
    if ($type == 'seeker') {
      $endpoint = $this->getSeekerEndpoint(self::AWARD_SBP_ENDPOINT);
    }
    $args = [$id, $amount];
    $response = $this->request(parent::METHOD_POST, $endpoint, $args);

    return $response;
  }

  public function revokeRP($id, $amount, $type = 'alchemist')
  {
    $endpoint = $this->getAlchemistEndpoint(self::REVOKE_RP_ENDPOINT);
    if ($type == 'seeker') {
      $endpoint = $endpoint = $this->getSeekerEndpoint(self::REVOKE_RP_ENDPOINT);
    }
    $args = [$id, $amount];
    $response = $this->request(parent::METHOD_POST, $endpoint, $args);

    return $response;
  }

  public function revokeSBP($id, $amount, $type = 'alchemist')
  {
    $endpoint = $this->getAlchemistEndpoint(self::REVOKE_SBP_ENDPOINT);
    if ($type == 'seeker') {
      $endpoint = $this->getSeekerEndpoint(self::REVOKE_SBP_ENDPOINT);
    }
    $args = [$id, $amount];
    $response = $this->request(parent::METHOD_POST, $endpoint, $args);

    return $response;
  }

  public function getSeekerById($id)
  {
    $endpoint = $this->getSeekerEndpoint(self::GET_SEEKER_BY_ID_ENDPOINT);
    $args = [$id];
    $response = $this->request(parent::METHOD_POST, $endpoint, $args);

    return $response;
  }

  public function getAlchemistById($id)
  {
    $endpoint = $this->getAlchemistEndpoint(self::GET_ALCHEMIST_BY_ID_ENDPOINT);
    $args = [$id];
    $response = $this->request(parent::METHOD_POST, $endpoint, $args);

    return $response;
  }

  public function redeemRP($id, $amount, $type = 'alchemist')
  {
    $endpoint = $this->getAlchemistEndpoint(self::REDEEM_RP_ENDPOINT);
    if ($type == 'seeker') {
      $endpoint = $this->getSeekerEndpoint(self::REDEEM_RP_ENDPOINT);
    }
    $args = [$id, $amount];
    $response = $this->request(parent::METHOD_POST, $endpoint, $args);

    return $response;
  }

  public function redeemSBP($alchemistId, $amount)
  {
    $endpoint = $this->getAlchemistEndpoint(self::REDEEM_SBP_ENDPOINT);
    $args = [$alchemistId, $amount];
    $response = $this->request(parent::METHOD_POST, $endpoint, $args);

    return $response;
  }


}
