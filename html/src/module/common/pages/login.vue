<style lang="">
    .box800{width: 800px;height: auto;margin: 0 auto;}
    
    
    .main {
        background-color: #fff;
        margin: 40px 0 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #e5e5e5;
    }
    .main .lost-pw {
    float: right;
    color: #666;font-size: 12px;
}
    .loginform, .regform, .retform, .changeform {
        width: 350px;
        margin: auto;
    }
</style>
<template>
    <div class="box800">
        <minHeader :headerTitle="headerTitle" :topUrl="topUrl"></minHeader>
        <div class="main">
            <Form ref="login" :model="login" :rules="ruleInline"  class="loginform">
                <Form-item prop="phone">
                    <Input type="text" v-model="login.phone"  size="large" placeholder="注册时填写的手机号">
                        <Icon type="ios-person-outline" slot="prepend"></Icon>
                    </Input>
                </Form-item>
                <Form-item prop="password">
                    <Input type="password" v-model="login.password" size="large" placeholder="请输入密码">
                        <Icon type="ios-locked-outline" slot="prepend" ></Icon>
                    </Input>
                </Form-item>
                <Row>
                    <Col span="12">
                        <Form-item prop="code">
                            <Input type="text" v-model="login.code" size="large" placeholder="请输入验证码">
                                <Icon type="ios-locked-outline" slot="prepend" ></Icon>
                            </Input>
                        </Form-item>
                    </Col>
                    <Col span="10" offset="1">
                        <img :src="verifyUrl" @click="refreshVerify()" class="code-img" title="点击切换验证码">
                    </Col>
                </Row>
                
                <Form-item inline>
                    <Checkbox-group v-model="login.checkbox">
                        <Checkbox label="七天内自动登录"></Checkbox>
                        <a class="lost-pw" href="/retrieve" target="_blank" tabindex="-1">忘记密码?</a>
                    </Checkbox-group>
                </Form-item>
                <Form-item>
                    <Button type="primary" @click="handleSubmit('login')" size="large" long>登录</Button>
                </Form-item>
            </Form>
        </div>
        <minFooter></minFooter>
    </div>
</template>
<script>
import minHeader from './min-header.vue'
import minFooter from './min-footer.vue'
    export default {
        data () {
            const validateCode = (rule, value, callback) => {
                if (!value) {
                    return callback(new Error('验证码不能为空'));
                }

                let reg = /^[\u4E00-\u9FA5A-Za-z0-9]+$/;
                if (!reg.test(value)) {
                    callback(new Error('验证码中能中文数字'));
                } else {
                    callback();
                }
            }
            const validatePhone = (rule, value, callback) => {
                if (!value) {
                    return callback(new Error('验证码不能为空'));
                }

                let reg = /^1(3|4|5|7|8)[0-9]\d{8}$/;
                if (!reg.test(value)) {
                    callback(new Error('请正确输入手机号码'));
                } else {
                    callback();
                }
            }
            return {
                login: {
                    phone: '',
                    password: '',
                    code: '',
                },
                ruleInline: {
                    phone: [
                        { required: true, message: '请填写手机号', trigger: 'blur' },
                        {validator: validatePhone, trigger: 'blur'}
                    ],
                    password: [
                        { required: true, message: '请填写密码', trigger: 'blur' },
                        { type: 'string', min: 6, message: '密码长度不能小于6位', trigger: 'blur' }
                    ],
                    code: [
                        {required: true, message: '验证码不能为空', trigger: 'blur'},
                        {validator: validateCode, trigger: 'blur'}
                    ]
                },
                verifyUrl: '/api/login/code',
                headerTitle: '登录',
                topUrl:{'title':'免费注册,立即使用','tourl':'/register'},

            }
        },
        components:{
            minHeader,
            minFooter
        },
        methods: {
            handleSubmit(name) {
                this.$refs[name].validate((valid) => {
                    if (valid) {
                        this.$Message.success('提交成功!');
                        this.request('Login', this.formValidate).then((res) => {
                            if (res.status) {
                                this.mainMenu(res.data.menu)
                                //追加路由菜单
                                let routes = sessionRouters(res.data.menu)

                                //重新追加权限路由
                                for (let route of routes) {
                                    this.$router.options.routes.push(route)
                                }
                                this.$router.addRoutes(routes)
                                this.$Message.success("登陆成功")
                                //验证通过
                                this.login_loading = true
                                let user_info = res.data.user_info
                                let token = res.data.token
                                this.userLogin({
                                    user_info,
                                    token
                                })
                                this.$router.push({ path: '/home/' })
                                //console.log(this.$router.options.routes)
                                //console.log(this.formValidate)
                            } else {
                                this.$Message.error(res.msg)
                            }
                        })
                    } else {
                        this.$Message.error('表单验证失败!');
                    }
                })
            },
            handleReset (name) {
                this.$refs[name].resetFields();
            },
            refreshVerify() {
                this.verifyUrl = ''
                setTimeout(() => {
                    this.verifyUrl = '/api/login/code?v=' + Math.random() * 1000
                }, 500)
            }
        }
    }
</script>