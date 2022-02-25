<?php

namespace Ysheng\Meituan;

class Member extends BaseClient
{
    // 门店-创建会员
    public function createMember($param)
    {
        $url = 'rms/pos/api/v1/poi/configs/business/query';
        $data = [
            'orgId' => $param['orgId'],
            'mobile' => $param['mobile'], // 手机号
        ];

        isset($param['name']) ?? ($data['name'] = $param['name']); // 昵称
        isset($param['sex']) ?? ($data['sex'] = $param['sex']); // 性别。1:男；2:女
        isset($param['birthdayType']) ?? ($data['birthdayType'] = $param['birthdayType']); // 生日类型。1:阴历；2:阳历
        isset($param['birthday']) ?? ($data['birthday'] = $param['birthday']); // 生日 1595575131000
        isset($param['openId']) ?? ($data['openId'] = $param['openId']); // 公众号openId

        return $this->request($url, $data, 18);
    }

    // 门店-更新会员
    public function updateMember($param)
    {
        $url = 'rms/pos/api/v1/poi/configs/business/query';
        $data = [
            'orgId' => $param['orgId'],
            'memberId' => $param['memberId'], // 会员ID
        ];

        isset($param['name']) ?? ($data['name'] = $param['name']); // 昵称
        isset($param['mobile']) ?? ($data['mobile'] = $param['mobile']); // 手机号
        isset($param['sex']) ?? ($data['sex'] = $param['sex']); // 性别。1:男；2:女
        isset($param['birthdayType']) ?? ($data['birthdayType'] = $param['birthdayType']); // 生日类型。1:阴历；2:阳历
        isset($param['birthday']) ?? ($data['birthday'] = $param['birthday']); // 生日 1595575131000
        isset($param['openId']) ?? ($data['openId'] = $param['openId']); // 公众号openId

        return $this->request($url, $data, 18);
    }

    // 门店查询会员
    public function getShopMember($param)
    {
        $url = 'rms/pos/api/v1/poi/configs/business/query';
        $data = [
            'orgId' => $param['orgId'],
            'mobile' => $param['mobile'], // 手机号
        ];

        return $this->request($url, $data, 18);
    }

    // 查询会员信息
    public function getMember2($param)
    {
        $url = 'rms/crm/api/v2/poi/member/search';
        $data = [
            'orgId' => $param['orgId'], // 机构ID
            'memberIdentity' => $param['memberIdentity'], // 会员认证信息
            'identityType' => $param['identityType'], // 认证类型。1-会员ID，2-手机号
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-查询会员信息
    public function getShopMember3($param)
    {
        $url = 'rms/crm/api/v3/poi/member/search';
        $data = [
            'orgId' => $param['orgId'], // 机构ID
            'memberIdentity' => $param['memberIdentity'], // 会员认证信息
            'identityType' => $param['identityType'], // 认证类型。1-会员ID，2-手机号
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-查询微会员绑定信息
    public function getShopWxBindinfo($param)
    {
        $url = 'rms/crm/api/v1/poi/member/wx/bindinfo';
        $data = [
            'orgId' => $param['orgId'], // 机构ID
            'memberId' => $param['memberIdentity'], // 会员ID
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-查询会员资产
    public function getShopMemberAsset($param)
    {
        $url = 'rms/crm/api/v1/poi/member/asset/query';
        $data = [
            'orgId' => $param['orgId'],
        ];

        isset($param['memberId']) ?? ($data['memberId'] = $param['memberId']); // 会员ID
        isset($param['cardId']) ?? ($data['cardId'] = $param['cardId']); // 卡Id

        return $this->request($url, $data, 18);
    }

    // 门店-扣减积分
    public function getShopDeductPoint($param)
    {
        $url = 'rms/crm/api/v1/poi/point/deduct';
        $data = [
            'orgId' => $param['orgId'], // 机构ID
            'memberId' => $param['memberId'], // 会员ID
            'cardId' => $param['cardId'], // 卡ID
            'num' => $param['num'], // 扣减积分数量
            'serialNo' => $param['serialNo'], // 流水号。接入方需保证流水号的唯一性，服务端会根据流水号做幂等处理
        ];

        isset($param['remark']) ?? ($data['remark'] = $param['remark']); // 扣减备注

        return $this->request($url, $data, 18);
    }

    // 门店-查询卡权益
    public function getShopCardRights($param)
    {
        $url = 'rms/crm/api/v1/poi/card/rights/query';
        $data = [
            'orgId' => $param['orgId'], // 机构ID
            'cardId' => $param['cardId'], // 卡ID
        ];

        return $this->request($url, $data, 18);
    }

    // 查询门店卡操作（交易）明细列表
    public function getShopCardsTransactions2($param)
    {
        $url = 'rms/crm/api/v2/poi/cards/transactions/query';
        $data = [
            'orgId' => $param['orgId'], // 总部ID
            'pageNo' => $param['pageNo'], // 分页页码，从1开始
            'pageSize' => $param['pageSize'], // 分页大小，建议最大不超过2000
            'startTime' => $param['startTime'], // 创建时间范围查询开始时间戳，毫秒
            'endTime' => $param['endTime'], // 创建时间范围查询结束时间戳，毫秒
        ];

        isset($param['operateTypeList']) ?? ($data['operateTypeList'] = $param['operateTypeList']); // 操作类型，数组，支持多个类型
        isset($param['cardNo']) ?? ($data['cardNo'] = $param['cardNo']); // 会员卡卡号
        isset($param['id']) ?? ($data['id'] = $param['id']); // 会员流水号

        return $this->request($url, $data, 18);
    }

    // 门店-获取会员卡（会员档案）列表
    public function getShopCards($param)
    {
        $url = 'rms/crm/api/v1/poi/cards/query';
        $data = [
            'orgId' => $param['orgId'],
            'pageStart' => $param['pageNo'], // 分页开始编号，从0开始
            'pageSize' => $param['pageSize'], // 分页大小，建议最大不超过2000
        ];

        isset($param['memberId']) ?? ($data['memberId'] = $param['memberId']); // 会员ID
        isset($param['cardId']) ?? ($data['cardId'] = $param['cardId']); // 会员卡ID

        return $this->request($url, $data, 18);
    }

    // 门店-获取卡操作（交易）明细列表
    public function getShopCardsTransactions($param)
    {
        $url = 'rms/crm/api/v1/poi/cards/transactions/query';
        $data = [
            'orgId' => $param['orgId'], // 总部ID
            'pageNo' => $param['pageNo'], // 分页页码，从1开始
            'pageSize' => $param['pageSize'], // 分页大小，建议最大不超过2000
            'startTime' => $param['startTime'], // 创建时间范围查询开始时间戳，毫秒
            'endTime' => $param['endTime'], // 创建时间范围查询结束时间戳，毫秒
        ];

        isset($param['operateTypeList']) ?? ($data['operateTypeList'] = $param['operateTypeList']); // 操作类型，数组，支持多个类型
        isset($param['cardNo']) ?? ($data['cardNo'] = $param['cardNo']); // 会员卡卡号

        return $this->request($url, $data, 18);
    }

    // 查询总部会员信息
    public function getMember($param)
    {
        $url = 'rms/crm/api/v1/chain/member/search';
        $data = [
            'orgId' => $param['orgId'], // 机构ID
            'memberIdentity' => $param['memberIdentity'], // 会员认证信息
            'identityType' => $param['identityType'], // 认证类型。1-会员ID，2-手机号
        ];

        return $this->request($url, $data, 18);
    }

    // 查询总部会员资产
    public function getMemberAsset($param)
    {
        $url = 'rms/crm/api/v1/chain/member/asset/query';
        $data = [
            'orgId' => $param['orgId'], // 机构ID
        ];

        isset($param['memberId']) ?? ($data['memberId'] = $param['memberId']); // 会员id
        isset($param['cardId']) ?? ($data['cardId'] = $param['cardId']); // 会员卡id

        return $this->request($url, $data, 18);
    }

    // 查询总部卡操作（交易）明细列表
    public function getCardsTransactions($param)
    {
        $url = 'rms/crm/api/v1/chain/cards/transactions/query';
        $data = [
            'orgId' => $param['orgId'], // 总部ID
            'pageNo' => $param['pageNo'], // 分页页码，从1开始
            'pageSize' => $param['pageSize'], // 分页大小，建议最大不超过2000
            'startTime' => $param['startTime'], // 创建时间范围查询开始时间戳，毫秒
            'endTime' => $param['endTime'], // 创建时间范围查询结束时间戳，毫秒
        ];

        isset($param['operateTypeList']) ?? ($data['operateTypeList'] = $param['operateTypeList']); // 操作类型，数组，支持多个类型
        isset($param['cardNo']) ?? ($data['cardNo'] = $param['cardNo']); // 会员卡卡号
        isset($param['id']) ?? ($data['id'] = $param['id']); // 会员流水号

        return $this->request($url, $data, 18);
    }

    // 查询总部会员卡（会员档案）列表
    public function getMemberCards($param)
    {
        $url = 'rms/crm/api/v1/chain/cards/query';
        $data = [
            'orgId' => $param['orgId'], // 总部ID
            'pageStart' => $param['pageStart'], // 分页开始编号
            'pageSize' => $param['pageSize'], // 分页大小，建议最大不超过2000
        ];

        isset($param['memberId']) ?? ($data['memberId'] = $param['memberId']); // 会员id
        isset($param['cardId']) ?? ($data['cardId'] = $param['cardId']); // 会员卡id

        return $this->request($url, $data, 18);
    }
}
