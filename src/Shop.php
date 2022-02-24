<?php

namespace Ysheng\Meituan;

class Shop extends BaseClient
{
    // 获取授权资源ID列表
    public function getResources()
    {
        $url = 'rms/base/v1/auth/resources/get';
        $data = [];

        return $this->request($url, $data, 18);
    }

    // 门店-获取配置信息
    public function getShopConfigs($param)
    {
        $url = 'rms/pos/api/v1/poi/configs/business/query';
        $data = [
            'orgId' => $param['orgId']
        ];

        return $this->request('POST', $url, $data, 18);
    }

    // 总部-获取支付方式
    public function getPayments($param)
    {
        $url = 'rms/pos/api/v1/chain/configs/payments/query';
        $data = [
            'orgId' => $param['orgId']
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取支付方式
    public function getShopPayments($param)
    {
        $url = 'rms/pos/api/v1/poi/configs/payments/query';
        $data = [
            'orgId' => $param['orgId']
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取营业日起止时间
    public function getShopCleartime($param)
    {
        $url = 'rms/pos/api/v1/poi/configs/cleartime/query';
        $data = [
            'orgId' => $param['orgId'], // 组织机构id
        ];

        isset($param['date']) ?? ($data['date'] = $param['date']); // 默认当前时间戳 精确到毫秒

        return $this->request($url, $data, 18);
    }

    // 门店-获取饿了么外卖订单明细
    public function getShopEleWmOrders($param)
    {
        $url = 'rms/pos/api/v1/poi/orders/waimai/ele/query';
        $data = [
            'orgId' => $param['orgId'],
            'req' => [
                // 'statusList' => $param['statusList'], // 外卖订单状态：1000 待接单,1100 待配送,1200 配送中,1300 已送达,1400 已完成,1500 已取消， 默认查全部
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

    // 门店-获取美团外卖订单明细
    public function getShopMtWmOrders($param)
    {
        $url = 'rms/pos/api/v1/poi/orders/waimai/mt/query';
        $data = [
            'orgId' => $param['orgId'],
            'req' => [
                // 'statusList' => $param['statusList'], // 外卖订单状态：1000 待接单,1100 待配送,1200 配送中,1300 已送达,1400 已完成,1500 已取消， 默认查全部
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

    // 门店-获取活动详情
    public function getShopPromotions($param)
    {
        $url = 'rms/pos/api/v1/poi/promotions/campaigns/query';
        $data = [
            'orgId' => $param['orgId'], // 组织机构
            'bizLine' => $param['bizLine'], // 业务线 60
        ];

        return $this->request($url, $data, 18);
    }

    // 总部-获取活动详情
    public function getPromotions($param)
    {
        $url = 'rms/pos/api/v1/chain/promotions/campaigns/query';
        $data = [
            'orgId' => $param['orgId'],
            'bizLine' => $param['bizLine'], // 业务线 60
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取每日店内的收入类型（菜品分类）的售卖数据
    public function getShopDailyGoodsSaleData($param)
    {
        $url = 'rms/data/api/v1/poi/rms_znb_instore_sku_cate_sale/query';
        $data = [
            'orgId' => $param['orgId'],
            'stlmntDatekey' => $param['stlmntDatekey'], // 结算日期 20200123
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取每日外卖的收入类型（菜品分类）的售卖数据
    public function getShopDailyWmGoodsSaleData($param)
    {
        $url = 'rms/data/api/v1/poi/rms_znb_wm_sku_cate_sale/query';
        $data = [
            'orgId' => $param['orgId'],
            'stlmntDatekey' => $param['stlmntDatekey'], // 结算日期 20200123
            'wmType' => $param['wmType'] // 0-总体;1-美团外卖;2-饿了么外卖
        ];

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

    // 门店-获取每日会员储值金额变动
    public function getShopDailyCrmAsset($param)
    {
        $url = 'rms/data/api/v1/poi/rms_znb_crm_asset/query';
        $data = [
            'orgId' => $param['orgId'],
            'beginDateKey' => $param['beginDateKey'], // 开始日期 20200123
            'endDateKey' => $param['endDateKey'], // 结束日期 20200123
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取每日店内优惠构成数据
    public function getShopDailyDiscountData($param)
    {
        $url = 'rms/data/api/v1/poi/rms_znb_biz_cmpgn/query';
        $data = [
            'orgId' => $param['orgId'],
            'stlmntDatekey' => $param['stlmntDatekey'], // 结算日期 20200123
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取店内每日收入构成数据
    public function getShopDailyPayData($param)
    {
        $url = 'rms/data/api/v1/poi/rms_znb_biz_pay/query';
        $data = [
            'orgId' => $param['orgId'],
            'stlmntDatekey' => $param['stlmntDatekey'], // 结算日期 20200123
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取门店每日外卖营收数据
    public function getShopDailyWmData($param)
    {
        $url = 'rms/data/api/v1/poi/rms_znb_biz_wm/query';
        $data = [
            'orgId' => $param['orgId'],
            'stlmntDatekey' => $param['stlmntDatekey'], // 结算日期 20200123
            'wmType' => $param['wmType'] // 0-总体;1-美团外卖;2-饿了么外卖
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取门店每日店内营收数据
    public function getShopDailyData($param)
    {
        $url = 'rms/data/api/v1/poi/rms_znb_biz_instore/query';
        $data = [
            'orgId' => $param['orgId'],
            'stlmntDatekey' => $param['stlmntDatekey'] // 结算日期 20200123
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取组织机构节点信息
    public function getShopOrg($param)
    {
        $url = 'rms/pos/api/v1/poi/org/query';
        $data = [
            'orgId' => $param['orgId']
        ];

        return $this->request($url, $data, 18);
    }

    // 总部-获取组织机构节点信息
    public function getOrg($param)
    {
        $url = 'rms/pos/api/v1/chain/org/query';
        $data = [
            'orgId' => $param['orgId']
        ];

        return $this->request($url, $data, 18);
    }

    // 总部-获取组织机构下的品牌信息
    public function getBrands($param)
    {
        $url = 'rms/pos/api/v1/chain/brands/query';
        $data = [
            'orgId' => $param['orgId'],
            'req' => [
                // 'showDeleted' => $param['showDeleted'], // 是否查询已删除的信息，1-显示，2-不显示（默认）
                'pageNo' => $param['pageNo'], // 页号
                'pageSize' => $param['pageSize'] // 页大小
            ]
        ];

        return $this->request($url, $data, 18);
    }

    // 获取门店信息
    public function getShop($param)
    {
        $url = 'rms/pos/api/v1/poi/query';
        $data = [
            'orgId' => $param['orgId']
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取区域信息
    public function getShopAreas($param)
    {
        $url = 'rms/pos/api/v1/poi/areas/query';
        $data = [
            'orgId' => $param['orgId']
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取挂帐客户信息
    public function getShopSubjects($param)
    {
        $url = 'rms/pos/api/v1/poi/onaccount/subjects/query';
        $data = [
            'orgId' => $param['orgId']
        ];

        return $this->request('POST', $url, $data, 18);
    }

    // 门店-获取挂帐和还款明细
    public function getShopBills($param)
    {
        $url = 'rms/pos/api/v1/poi/onaccount/bills/query';
        $data = [
            'orgId' => $param['orgId'],
            'req' => [
                'startTime' => $param['startTime'], // 搜索的开始时间
                'endTime' => $param['endTime'], // 搜索的结束时间
                'transTypes' => $param['transTypes'], // 交易类型：1是挂帐。2是还款
                'pageNo' => $param['pageNo'], // 页号
                'pageSize' => $param['pageSize'] // 页大小
            ]
        ];

        return $this->request('POST', $url, $data, 18);
    }

    // 门店-获取桌台信息
    public function getShopTables($param)
    {
        $url = 'rms/pos/api/v1/poi/tables/query';
        $data = [
            'orgId' => $param['orgId']
        ];

        return $this->request('POST', $url, $data, 18);
    }
}
