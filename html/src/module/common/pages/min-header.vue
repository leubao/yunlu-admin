<style>
    .min-header{
        margin: 50px 0 40px;
        border-bottom: 1px solid #e5e5e5;
        padding-bottom: 30px;
    }
    .min-header .header-side {
        font-size: 14px;
        color: #3388FF;
        float: right;
        margin-top: 12px;
    }
    .min-header .header-title {
        position: relative;
        top: 10px;
        font-size: 16px;
        color: #333;
        padding-left: 10px;
        margin: 0 100px 0 95px;
        border-left: 2px solid #ebebeb;
    }
    .min-header .header-logo {
        float: left;
        width: 85px;
        height: 30px;
        background: url(/v2/image/wsc/youzan_logo20161201.png) no-repeat;
        position: relative;
        margin-top: -1px;
    }
</style>
<template>
<div class="min-header">
    <div class="header-side">
    	<router-link :to="{path:topUrl.tourl}" class="js-route-transfer">{{topUrl.title}}</router-link>
    </div>
    <a href="//www.youzan.com" class="js-route">
        <div class="header-logo"></div>
    </a>
    <div class="header-title">{{headerTitle}}</div>
</div>
</template>
<script>
    export default {
    	data () {
    		return{}
    	},
    	props:['headerTitle','topUrl'],
    }
</script>