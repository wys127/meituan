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

    // 门店-发券
    public function getShopcouponSend($param)
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

    // 根据订单id查询订单详情v2(包含联台子单)
    public function getShopOrdersDetail2($param)
    {
        $url = 'rms/pos/api/v2/poi/orders/ids/query';
        $data = [
            'orgId' => $param['orgId'], // 机构ID
            'req' => [
                // 'statusList' => $param['statusList'], // 订单状态列表：100 已创建, 200 已下单,300 已结账,600 已取消
                'pageNo' => $param['pageNo'], // 分页号
                'pageSize' => $param['pageSize'], // 单页长度，不超过50
                'queryTimeType' => $param['queryTimeType'], // 查询时间类型：1-下单时间，2-结账时间 3-外卖接单时间
                'beginTime' => $param['beginTime'], // 开始时间（毫秒）
                'endTime' => $param['endTime'], // 结束时间（毫秒）
                // 'sortField' => $param['sortField'], // 排序字段：1下单时间 2结账时间
                // 'sort' => $param['sort'], // 排序方向：1逆序 2正序
                'orderIds' => $param['orderIds'], // 订单id
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取店内订单明细v2
    public function getShopInstoreOrders($param)
    {
        $url = 'rms/pos/api/v2/poi/orders/instore/query';
        $data = [
            'orgId' => $param['orgId'], // 机构ID
            'req' => [
                // 'statusList' => $param['statusList'], // 订单状态列表：100 已创建, 200 已下单,300 已结账,600 已取消 ， 默认查全部
                'pageNo' => $param['pageNo'], // 分页号, 默认为1
                'pageSize' => $param['pageSize'], // 单页长度，不超过50，默认20
                'queryTimeType' => $param['queryTimeType'], // 查询时间类型：1-下单时间，2-结账时间 3-外卖接单时间 4-营业日期
                'beginTime' => $param['beginTime'], // 开始时间（毫秒）
                'endTime' => $param['endTime'], // 结束时间（毫秒）
                // 'sortField' => $param['sortField'], // 排序字段：1下单时间 2结账时间，默认无
                // 'sort' => $param['sort'], // 排序方向：1逆序 2正序，默认无
            ],
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

    // 门店-营业收款统计
    public function getShopBusinessReceiptr($param)
    {
        $url = 'rms/data/api/v1/poi/business_receipt/query';
        $data = [
            'orgId' => $param['orgId'], // 机构ID
            'startDate' => $param['startDate'], // 起始日期的时间戳
            'endDate' => $param['endDate'], // 结束日期的时间戳，日期范围最大跨度31天
            'pageNo' => $param['pageNo'], // 分页参数-第几页
            'pageSize' => $param['pageSize'], // 分页参数-每页数据条数
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-收入优惠统计
    public function getShopIncomeDiscount($param)
    {
        $url = 'rms/data/api/v1/poi/income_discount/query';
        $data = [
            'orgId' => $param['orgId'], // 机构ID
            'startDate' => $param['startDate'], // 起始日期的时间戳
            'endDate' => $param['endDate'], // 结束日期的时间戳，日期范围最大跨度31天
            'pageNo' => $param['pageNo'], // 分页参数-第几页
            'pageSize' => $param['pageSize'], // 分页参数-每页数据条数
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-销售品项统计
    public function getShopSaleType($param)
    {
        $url = 'rms/data/api/v1/poi/sale_type/query';
        $data = [
            'orgId' => $param['orgId'], // 机构ID
            'startDate' => $param['startDate'], // 起始日期的时间戳
            'endDate' => $param['endDate'], // 结束日期的时间戳，日期范围最大跨度31天
            'pageNo' => $param['pageNo'], // 分页参数-第几页
            'pageSize' => $param['pageSize'], // 分页参数-每页数据条数
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-菜品销售统计
    public function getShopDishSale($param)
    {
        $url = 'rms/data/api/v1/poi/dish_sale/query';
        $data = [
            'orgId' => $param['orgId'], // 机构ID
            'startDate' => $param['startDate'], // 起始日期的时间戳
            'endDate' => $param['endDate'], // 结束日期的时间戳，日期范围最大跨度31天
            'pageNo' => $param['pageNo'], // 分页参数-第几页
            'pageSize' => $param['pageSize'], // 分页参数-每页数据条数
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-支付结算统计
    public function getShopPayStlmnt($param)
    {
        $url = 'rms/data/api/v1/poi/pay_stlmnt/query';
        $data = [
            'orgId' => $param['orgId'], // 机构ID
            'startDate' => $param['startDate'], // 起始日期的时间戳
            'endDate' => $param['endDate'], // 结束日期的时间戳，日期范围最大跨度31天
            'pageNo' => $param['pageNo'], // 分页参数-第几页
            'pageSize' => $param['pageSize'], // 分页参数-每页数据条数
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-查询自营外卖订单明细
    public function getShopWmSelfOrder($param)
    {
        $url = 'rms/pos/api/v1/poi/orders/waimai/self/query';
        $data = [
            'orgId' => $param['orgId'], // 机构ID
            'req' => [
                // 'statusList' => $param['statusList'], // 外卖订单状态：1000 待接单,1100 待配送,1200 配送中,1300 已送达,1400 已完成,1500 已取消
                'pageNo' => $param['pageNo'], // 分页号
                'pageSize' => $param['pageSize'], // 单页长度，不超过50
                'queryTimeType' => $param['queryTimeType'], // 查询时间类型：1-下单时间，2-结账时间 3-外卖接单时间 4-营业日期
                'beginTime' => $param['beginTime'], // 开始时间（毫秒）
                'endTime' => $param['endTime'], // 结束时间（毫秒）
                // 'sortField' => $param['sortField'], // 排序字段：1下单时间 2结账时间
                // 'sort' => $param['sort'], // 排序方向：1逆序 2正序
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 查询门店卡操作（交易）明细列表
    public function getShopCardsTransactions($param)
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

    // 查询总部外卖菜品接口
    public function getWmGoods($param)
    {
        $url = 'rms/pos/api/v1/chain/wm/goods/query';
        $data = [
            'orgId' => $param['orgId'], // 机构ID
            'req' => [ // 需设置req.spuType=10
                'spuType' => 10, // spu类型，10.菜品
                'pageNo' => $param['pageNo'], // 页码
                'pageSize' => $param['pageSize'], // 页码大小
                // 'showTaxRateDepartment' => $param['showTaxRateDepartment'], // 税率信息展示：1展示，默认不展示
                'wmSource' => $param['wmSource'], // 外卖来源：1-美团，2-饿了么
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 查询总部外卖分类接口
    public function getWmcate($param)
    {
        $url = 'rms/pos/api/v1/chain/wm/category/query';
        $data = [
            'orgId' => $param['orgId'], // 机构ID
            'req' => [
                // 'brandId' => $param['brandId'], // 品牌id
                'wmSource' => $param['wmSource'], // 外卖来源：1-美团外卖，2-饿了么外卖
                'pageNo' => $param['pageNo'], // 页码
                'pageSize' => $param['pageSize'], // 页大小
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 根据订单id查询订单详情
    public function getShopOrdersDetail($param)
    {
        $url = 'api/v1/poi/orders/ids/query';
        $data = [
            'orgId' => $param['orgId'], // 机构ID
            'req' => [
                // 'statusList' => $param['statusList'], // 订单状态列表：100 已创建, 200 已下单,300 已结账,600 已取消
                'pageNo' => $param['pageNo'], // 分页号
                'pageSize' => $param['pageSize'], // 单页长度，不超过50
                'queryTimeType' => $param['queryTimeType'], // 查询时间类型：1-下单时间，2-结账时间 3-外卖接单时间
                'beginTime' => $param['beginTime'], // 开始时间（毫秒）
                'endTime' => $param['endTime'], // 结束时间（毫秒）
                // 'sortField' => $param['sortField'], // 排序字段：1下单时间 2结账时间
                // 'sort' => $param['sort'], // 排序方向：1逆序 2正序
                'orderIds' => $param['orderIds'], // 订单id
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 结账方式查询接口
    public function getShopSettlementMethod($param)
    {
        $url = 'rms/data/api/v1/poi/settlement_method/query';
        $data = [
            'orgId' => $param['orgId'], // 组织机构id
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取门店下的部门信息
    public function getShopDepart($param)
    {
        $url = 'rms/pos/api/v1/poi/depart/query';
        $data = [
            'orgId' => $param['orgId'], // 门店的orgId
            'req' => [
                // 'showDeleted' => $param['showDeleted'], // 是否查询已删除的信息，1-显示，2-不显示（默认）
                'pageNo' => $param['pageNo'], // 页数，从1开始
                'pageSize' => $param['pageSize'], // 页码大小，最大100
            ],
        ];

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
}
