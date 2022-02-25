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
