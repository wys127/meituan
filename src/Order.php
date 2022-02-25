<?php

namespace Ysheng\Meituan;

class Order extends BaseClient
{
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
}
