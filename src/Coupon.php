<?php

namespace Ysheng\Meituan;

class Coupon extends BaseClient
{
    // 门店-发券
    public function getShopCouponSend($param)
    {
        $url = 'rms/crm/api/v1/poi/coupon/send';
        $data = [
            'orgId' => $param['orgId'], // 机构ID
            'memberId' => $param['memberId'], // 会员ID
            'cardId' => $param['cardId'], // 卡ID
            'templateId' => $param['templateId'], // 券模板ID
            'num' => $param['num'], // 券张数
        ];

        isset($param['sendNotice']) ?? ($data['sendNotice'] = $param['sendNotice']); // 是否发送到账提醒 true
        isset($param['expireNotice']) ?? ($data['expireNotice'] = $param['expireNotice']); // 是否发送过期提醒 false
        isset($param['expireDays']) ?? ($data['expireDays'] = $param['expireDays']); // 过期提前提醒天数 3

        return $this->request($url, $data, 18);
    }

    // 门店-查询优惠券
    public function getShopCoupon($param)
    {
        $url = 'rms/crm/api/v1/poi/coupon/query';
        $data = [
            'orgId' => $param['orgId'], // 机构ID
            'memberId' => $param['memberId'], // 会员ID
            'cardId' => $param['cardId'], // 卡Id
            'pageParam' => [ // 分页对象
                'pageNo' => $param['pageNo'], // 页码
                'pageSize' => $param['pageSize'] // 分页条数，建议不超过1000
            ],
        ];

        isset($param['couponStatus']) ?? ($data['couponStatus'] = $param['couponStatus']); // 券状态。1-可用；2-冻结；3-已使用；4-已过期 [1,2]

        return $this->request($url, $data, 18);
    }

    // 门店-查询优惠券模板
    public function getShopCouponTemplate($param)
    {
        $url = 'rms/crm/api/v1/poi/coupon/template/query';
        $data = [
            'orgId' => $param['orgId'], // 机构ID
            'couponType' => $param['couponType'], // 券类型。10-代金券；20-折扣券；30-商品券
            'pageParam' => [ // 分页对象
                'pageNo' => $param['pageNo'], // 页码
                'pageSize' => $param['pageSize'] // 分页条数，建议不超过100
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 查询优惠券模板
    public function getShopCouponTemplate2($param)
    {
        $url = 'rms/crm/api/v2/poi/coupon/template/query';
        $data = [
            'orgId' => $param['orgId'],
            'pageNo' => $param['pageNo'],
            'pageSize' => $param['pageSize'],
        ];

        isset($param['type']) ?? ($data['type'] = $param['type']); // 券类型。1-代金券；2-商品券；3-折扣券
        isset($param['statusList']) ?? ($data['statusList'] = $param['statusList']); // array

        return $this->request($url, $data, 18);
    }

    // 查询优惠券
    public function getShopCoupon2($param)
    {
        $url = 'rms/crm/api/v2/poi/coupon/query';
        $data = [
            'orgId' => $param['orgId'], // 机构ID
            'pageNo' => $param['pageNo'], // 页码
            'pageSize' => $param['pageSize'], // 分页条数，建议不超过1000
        ];

        isset($param['cardId']) ?? ($data['cardId'] = $param['cardId']); // 会员卡id
        isset($param['memberId']) ?? ($data['memberId'] = $param['memberId']); // 会员id
        isset($param['statusList']) ?? ($data['statusList'] = $param['statusList']); // 券状态 0-未使用，1-已使用，2-已锁定，3-已过期 array

        return $this->request($url, $data, 18);
    }

    // 查询优惠券明细
    public function getShopCouponDetail($param)
    {
        $url = 'rms/crm/api/v1/poi/coupon/detail/query';
        $data = [
            'orgId' => $param['orgId'],
            'pageNo' => $param['pageNo'], // 页码
            'pageSize' => $param['pageSize'], // 分页条数，建议不超过1000
            // 'pageParam' => [ // 页面游标，当查询数据量超过1万条时使用
            //     'firstCursor' => '', // 页面的第一个游标，当查询数据量超过1万条时使用
            //     'lastCursor' => '', // 页面的最后一个游标，当查询数据量超过1万条时使用
            // ],
            'templateId' => $param['templateId'], // 券模板id
        ];

        isset($param['memberId']) ?? ($data['memberId'] = $param['memberId']); // 会员id
        isset($param['cardId']) ?? ($data['cardId'] = $param['cardId']); // 会员卡id
        isset($param['couponStatus']) ?? ($data['couponStatus'] = $param['couponStatus']); // 券状态 0-未使用，1-已使用，3-已过期, 不传则查询所有状态
        isset($param['couponCode']) ?? ($data['couponCode'] = $param['couponCode']); // 券码code

        return $this->request($url, $data, 18);
    }

    // 查询优惠券转赠明细
    public function getShopCouponTransfer($param)
    {
        $url = 'rms/crm/api/v1/poi/coupon/transfer/detail/query';
        $data = [
            'orgId' => $param['orgId'], // 机构ID
            'pageNo' => $param['pageNo'], // 页码
            'pageSize' => $param['pageSize'], // 分页条数，建议不超过1000
            // 'memberId' => $param['memberId'], // 会员id
            // 'cardId' => $param['cardId'], // 会员卡id
            // 'couponCode' => $param['couponCode'], // 券码code
        ];

        isset($param['memberId']) ?? ($data['memberId'] = $param['memberId']); // 会员id
        isset($param['cardId']) ?? ($data['cardId'] = $param['cardId']); // 会员卡id
        isset($param['couponCode']) ?? ($data['couponCode'] = $param['couponCode']); // 券码code

        return $this->request($url, $data, 18);
    }

    // 查询总部优惠券明细
    public function getCouponDetail($param)
    {
        $url = 'rms/crm/api/v1/chain/coupon/detail/query';
        $data = [
            'orgId' => $param['orgId'], // 机构ID
            'pageNo' => $param['pageNo'], // 页码
            'pageSize' => $param['pageSize'], // 分页条数，建议不超过1000
            // 'pageParam' => [ // 页面游标，当查询数据量超过1万条时使用
            //     'firstCursor' => '', // 页面的第一个游标，当查询数据量超过1万条时使用
            //     'lastCursor' => '', // 页面的最后一个游标，当查询数据量超过1万条时使用
            // ],
            'templateId' => $param['templateId'], // 券模板id
        ];

        isset($param['memberId']) ?? ($data['memberId'] = $param['memberId']); // 会员id
        isset($param['cardId']) ?? ($data['cardId'] = $param['cardId']); // 会员卡id
        isset($param['couponStatus']) ?? ($data['couponStatus'] = $param['couponStatus']); // 券状态 0-未使用，1-已使用，3-已过期, 不传则查询所有状态
        isset($param['couponCode']) ?? ($data['couponCode'] = $param['couponCode']); // 券码code

        return $this->request($url, $data, 18);
    }

    // 查询总部优惠券转赠明细
    public function getCouponTransfer($param)
    {
        $url = 'rms/crm/api/v1/chain/coupon/transfer/detail/query';
        $data = [
            'orgId' => $param['orgId'], // 机构ID
            'pageNo' => $param['pageNo'], // 页码
            'pageSize' => $param['pageSize'], // 分页条数，建议不超过1000
        ];

        isset($param['memberId']) ?? ($data['memberId'] = $param['memberId']); // 会员id
        isset($param['cardId']) ?? ($data['cardId'] = $param['cardId']); // 会员卡id
        isset($param['couponCode']) ?? ($data['couponCode'] = $param['couponCode']); // 券码code

        return $this->request($url, $data, 18);
    }

    // 查询总部优惠券v2
    public function getCoupon2($param)
    {
        $url = 'rms/crm/api/v2/chain/coupon/query';
        $data = [
            'orgId' => $param['orgId'], // 机构ID
            'pageNo' => $param['pageNo'], // 页码
            'pageSize' => $param['pageSize'], // 分页条数，建议不超过1000
        ];

        isset($param['cardId']) ?? ($data['cardId'] = $param['cardId']); // 会员卡id
        isset($param['memberId']) ?? ($data['memberId'] = $param['memberId']); // 会员id
        isset($param['statusList']) ?? ($data['statusList'] = $param['statusList']); // 券状态 0-未使用，1-已使用，2-已锁定，3-已过期 array

        return $this->request($url, $data, 18);
    }

    // 查询总部优惠券模板v2
    public function getCouponTemplate($param)
    {
        $url = 'rms/crm/api/v2/chain/coupon/template/query';
        $data = [
            'orgId' => $param['orgId'],
            'pageNo' => $param['pageNo'],
            'pageSize' => $param['pageSize'],
        ];

        isset($param['type']) ?? ($data['type'] = $param['type']); // 券类型。1-代金券；2-商品券；3-折扣券
        isset($param['statusList']) ?? ($data['statusList'] = $param['statusList']); // array

        return $this->request($url, $data, 18);
    }
}
