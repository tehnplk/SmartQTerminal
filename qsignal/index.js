var express = require("express");
var app = express();
var http = require("http").Server(app);
var io = require("socket.io")(http);
var cors = require("cors");

var path = require("path");

var port = process.env.PORT || 19009;

var knex = require("knex")({
  client: "mysql",
  connection: {
    host: "203.157.118.123",
    port: 3306,
    user: "sa",
    password: "qazwsxedcr112233",
    database: "hos"
  },
  pool: {
    afterCreate: (conn, done) => {
      conn.query("SET NAMES UTF8", err => {
        done(err, conn);
      });
    }
  }
});

app.use(cors());
app.get("/", function(req, res) {
  res.sendFile(__dirname + "/web/index.html");
});

var client = require("socket.io-client")(`http://localhost:${port}`);
//client = {เครื่องเรียกคิว, broweser เรียกทดสอบส่งสัญญาณมาที่ server}

app.get("/ca1/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`ca1`);
    return ;
  }
  await client.emit("ca1", q);
  res.send(`ca1 ${q}`);
});

app.get("/ca2/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`ca2`);
    return ;
  }
  await client.emit("ca2", q);
  res.send(`ca2 ${q}`);
});

app.get("/ca3/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`ca3`);
    return ;
  }
  await client.emit("ca3", q);
  res.send(`ca3 ${q}`);
});
//sa
app.get("/sa1/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`sa1`);
    return ;
  }
  await client.emit("sa1", q);
  res.send(`sa1 ${q}`);
});

app.get("/sa2/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`sa2`);
    return ;
  }
  await client.emit("sa2", q);
  res.send(`sa2 ${q}`);
});

app.get("/sa3/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`sa3`);
    return ;
  }
  await client.emit("sa3", q);
  res.send(`sa3 ${q}`);
});

app.get("/sa4/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`sa4`);
    return ;
  }
  await client.emit("sa4", q);
  res.send(`sa4 ${q}`);
});

app.get("/sa5/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`sa5`);
    return ;
  }
  await client.emit("sa5", q);
  res.send(`sa5 ${q}`);
});

app.get("/sa6/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`sa6`);
    return ;
  }
  await client.emit("sa6", q);
  res.send(`sa6 ${q}`);
});
//sb
app.get("/sb1/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`sb1`);
    return ;
  }
  await client.emit("sb1", q);
  res.send(`sb1 ${q}`);
});

app.get("/sb2/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`sb2`);
    return ;
  }
  await client.emit("sb2", q);
  res.send(`sb2 ${q}`);
});

app.get("/sb3/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`sb3`);
    return ;
  }
  await client.emit("sb3", q);
  res.send(`sb3 ${q}`);
});

app.get("/sb4/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`sb4`);
    return ;
  }
  await client.emit("sb4", q);
  res.send(`sb4 ${q}`);
});

app.get("/sb5/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`sb5`);
    return ;
  }
  await client.emit("sb5", q);
  res.send(`sb5 ${q}`);
});

app.get("/sb6/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`sb6`);
    return ;
  }
  await client.emit("sb6", q);
  res.send(`sb6 ${q}`);
});

//sc
app.get("/sc1/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`sc1`);
    return ;
  }
  await client.emit("sc1", q);
  res.send(`sc1 ${q}`);
});

app.get("/sc2/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`sc2`);
    return ;
  }
  await client.emit("sc2", q);
  res.send(`sc2 ${q}`);
});

app.get("/sc3/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`sc3`);
    return ;
  }
  await client.emit("sc3", q);
  res.send(`sc3 ${q}`);
});

app.get("/sc4/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`sc4`);
    return ;
  }
  await client.emit("sc4", q);
  res.send(`sc4 ${q}`);
});

app.get("/sc5/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`sc5`);
    return ;
  }
  await client.emit("sc5", q);
  res.send(`sc5 ${q}`);
});

app.get("/sc6/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`sc6`);
    return ;
  }
  await client.emit("sc6", q);
  res.send(`sc6 ${q}`);
});
//na
app.get("/na1/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`na1`);
    return ;
  }
  await client.emit("na1", q);
  res.send(`na1 ${q}`);
});

app.get("/na2/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`na2`);
    return ;
  }
  await client.emit("na2", q);
  res.send(`na2 ${q}`);
});

app.get("/na3/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`na3`);
    return ;
  }
  await client.emit("na3", q);
  res.send(`na3 ${q}`);
});

app.get("/na4/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`na4`);
    return ;
  }
  await client.emit("na4", q);
  res.send(`na4 ${q}`);
});

app.get("/na5/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`na5`);
    return ;
  }
  await client.emit("na5", q);
  res.send(`na5 ${q}`);
});

app.get("/na6/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`na6`);
    return ;
  }
  await client.emit("na6", q);
  res.send(`na6 ${q}`);
});

app.get("/nb1/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`nb1`);
    return ;
  }
  await client.emit("nb1", q);
  res.send(`nb1 ${q}`);
});

app.get("/nb2/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`nb2`);
    return ;
  }
  await client.emit("nb2", q);
  res.send(`nb2 ${q}`);
});

app.get("/nb3/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`nb3`);
    return ;
  }
  await client.emit("nb3", q);
  res.send(`nb3 ${q}`);
});

app.get("/nb4/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`nb4`);
    return ;
  }
  await client.emit("nb4", q);
  res.send(`nb4 ${q}`);
});

app.get("/nb5/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`nb5`);
    return ;
  }
  await client.emit("nb5", q);
  res.send(`nb5 ${q}`);
});

app.get("/nb6/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`nb6`);
    return ;
  }
  await client.emit("nb6", q);
  res.send(`nb6 ${q}`);
});


app.get("/a/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`a`);
    return ;
  }
  await client.emit("a", q);
  res.send(`a ${q}`);
});

//sb
app.get("/b/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`b`);
    return ;
  }
  await client.emit("b", q);
  res.send(`b ${q}`);
});

app.get("/c/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`c`);
    return ;
  }
  await client.emit("c", q);
  res.send(`c ${q}`);
});
 
//sc
app.get("/d/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`d`);
    return ;
  }
  await client.emit("d", q);
  res.send(`d ${q}`);
});
app.get("/f/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`f`);
    return ;
  }
  await client.emit("f", q);
  res.send(`f ${q}`);
});

app.get("/g/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`g`);
    return ;
  }
  await client.emit("g", q);
  res.send(`g ${q}`);
});

app.get("/h/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`h`);
    return ;
  }
  await client.emit("h", q);
  res.send(`h ${q}`);
});


app.get("/i/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`i`);
    return ;
  }
  await client.emit("i", q);
  res.send(`i ${q}`);
});

app.get("/j/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`j`);
    return ;
  }
  await client.emit("j", q);
  res.send(`j ${q}`);
});

app.get("/k/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`k`);
    return ;
  }
  await client.emit("k", q);
  res.send(`k ${q}`);
});
app.get("/l/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`l`);
    return ;
  }
  await client.emit("l", q);
  res.send(`l ${q}`);
});
app.get("/m/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`m`);
    return ;
  }
  await client.emit("m", q);
  res.send(`m ${q}`);
});

app.get("/n/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`n`);
    return ;
  }
  await client.emit("n", q);
  res.send(`n ${q}`);
});

app.get("/o/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`o`);
    return ;
  }
  await client.emit("o", q);
  res.send(`o ${q}`);
});

app.get("/p/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`p`);
    return ;
  }
  await client.emit("p", q);
  res.send(`p ${q}`);
});

app.get("/s/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`s`);
    return ;
  }
  await client.emit("s", q);
  res.send(`s ${q}`);
});

app.get("/t/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`t`);
    return ;
  }
  await client.emit("t", q);
  res.send(`t ${q}`);
});

app.get("/u/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`u`);
    return ;
  }
  await client.emit("u", q);
  res.send(`u ${q}`);
});

app.get("/v/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`v`);
    return ;
  }
  await client.emit("v", q);
  res.send(`v ${q}`);
});

app.get("/w/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`w`);
    return ;
  }
  await client.emit("w", q);
  res.send(`w ${q}`);
});

app.get("/x/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`x`);
    return ;
  }
  await client.emit("x", q);
  res.send(`x ${q}`);
});

app.get("/y/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`y`);
    return ;
  }
  await client.emit("y", q);
  res.send(`y ${q}`);
});




//er
app.get("/e/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`e`);
    return ;
  }
  await client.emit("e", q);
  res.send(`e ${q}`);
});

app.get("/r/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`r`);
    return ;
  }
  await client.emit("r", q);
  res.send(`r ${q}`);
});
app.get("/z/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`z`);
    return ;
  }
  await client.emit("z", q);
  res.send(`z ${q}`);
});

//rx
app.get("/rx1/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`rx1`);
    return ;
  }
  await client.emit("rx1", q);
  res.send(`rx1 ${q}`);
});

app.get("/rx2/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`rx2`);
    return ;
  }
  await client.emit("rx2", q);
  res.send(`rx2 ${q}`);
});
app.get("/rx3/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`rx3`);
    return ;
  }
  await client.emit("rx3", q);
  res.send(`rx3 ${q}`);
});
app.get("/rx4/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`rx4`);
    return ;
  }
  await client.emit("rx4", q);
  res.send(`rx4 ${q}`);
});
app.get("/rx5/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`rx5`);
    return ;
  }
  await client.emit("rx5", q);
  res.send(`rx5 ${q}`);
});

//ra
app.get("/ra1/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`ra1`);
    return ;
  }
  await client.emit("ra1", q);
  res.send(`ra1 ${q}`);
});

app.get("/ra2/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`ra2`);
    return ;
  }
  await client.emit("ra2", q);
  res.send(`ra2 ${q}`);
});
app.get("/ra3/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`ra3`);
    return ;
  }
  await client.emit("ra3", q);
  res.send(`ra3 ${q}`);
});
app.get("/ra4/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`ra4`);
    return ;
  }
  await client.emit("ra4", q);
  res.send(`ra4 ${q}`);
});
app.get("/ra5/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`ra5`);
    return ;
  }
  await client.emit("ra5", q);
  res.send(`ra5 ${q}`);
});

//rb
app.get("/rb1/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`rb1`);
    return ;
  }
  await client.emit("rb1", q);
  res.send(`rb1 ${q}`);
});

app.get("/rb2/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`rb2`);
    return ;
  }
  await client.emit("rb2", q);
  res.send(`rb2 ${q}`);
});
app.get("/rb3/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`rb3`);
    return ;
  }
  await client.emit("rb3", q);
  res.send(`rb3 ${q}`);
});
app.get("/rb4/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`rb4`);
    return ;
  }
  await client.emit("rb4", q);
  res.send(`rb4 ${q}`);
});
app.get("/rb5/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`rb5`);
    return ;
  }
  await client.emit("rb5", q);
  res.send(`rb5 ${q}`);
});

//ga
app.get("/ga1/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`ga1`);
    return ;
  }
  await client.emit("ga1", q);
  res.send(`ga1 ${q}`);
});

app.get("/ga2/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`ga2`);
    return ;
  }
  await client.emit("ga2", q);
  res.send(`ga2 ${q}`);
});
app.get("/ga3/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`ga3`);
    return ;
  }
  await client.emit("ga3", q);
  res.send(`ga3 ${q}`);
});

//ha
app.get("/ha1/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`ha1`);
    return ;
  }
  await client.emit("ha1", q);
  res.send(`ha1 ${q}`);
});

app.get("/ha2/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`ha2`);
    return ;
  }
  await client.emit("ha2", q);
  res.send(`ha2 ${q}`);
});
app.get("/ha3/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`ha3`);
    return ;
  }
  await client.emit("ha3", q);
  res.send(`ha3 ${q}`);
});

//hb
app.get("/hb1/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`hb1`);
    return ;
  }
  await client.emit("hb1", q);
  res.send(`hb1 ${q}`);
});

app.get("/hb2/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`hb2`);
    return ;
  }
  await client.emit("hb2", q);
  res.send(`hb2 ${q}`);
});
app.get("/hb3/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`hb3`);
    return ;
  }
  await client.emit("hb3", q);
  res.send(`hb3 ${q}`);
});

//la1
app.get("/la1/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`la1`);
    return ;
  }
  await client.emit("la1", q);
  res.send(`la1 ${q}`);
});
app.get("/la2/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`la2`);
    return ;
  }
  await client.emit("la2", q);
  res.send(`la2 ${q}`);
});

//ps
app.get("/ps1/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`ps1`);
    return ;
  }
  await client.emit("ps1", q);
  res.send(`ps1 ${q}`);
});

app.get("/ps2/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`ps2`);
    return ;
  }
  await client.emit("ps2", q);
  res.send(`ps2 ${q}`);
});

app.get("/ps3/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`ps3`);
    return ;
  }
  await client.emit("ps3", q);
  res.send(`ps3 ${q}`);
});

app.get("/ps4/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`ps4`);
    return ;
  }
  await client.emit("ps4", q);
  res.send(`ps4 ${q}`);
});

app.get("/ps5/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`ps5`);
    return ;
  }
  await client.emit("ps5", q);
  res.send(`ps5 ${q}`);
});

app.get("/ps6/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`ps6`);
    return ;
  }
  await client.emit("ps6", q);
  res.send(`ps6 ${q}`);
});
//pc
app.get("/pc1/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`pc1`);
    return ;
  }
  await client.emit("pc1", q);
  res.send(`pc1 ${q}`);
});

app.get("/pc2/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`pc2`);
    return ;
  }
  await client.emit("pc2", q);
  res.send(`pc2 ${q}`);
});

app.get("/pc3/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`pc3`);
    return ;
  }
  await client.emit("pc3", q);
  res.send(`pc3 ${q}`);
});

app.get("/pc4/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`pc4`);
    return ;
  }
  await client.emit("pc4", q);
  res.send(`pc4 ${q}`);
});

app.get("/pc5/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`pc5`);
    return ;
  }
  await client.emit("pc5", q);
  res.send(`pc5 ${q}`);
});

app.get("/pc6/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`pc6`);
    return ;
  }
  await client.emit("pc6", q);
  res.send(`pc6 ${q}`);
});

//da
app.get("/da1/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`da1`);
    return ;
  }
  await client.emit("da1", q);
  res.send(`da1 ${q}`);
});

app.get("/da2/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`da2`);
    return ;
  }
  await client.emit("da2", q);
  res.send(`da2 ${q}`);
});

app.get("/da3/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`da3`);
    return ;
  }
  await client.emit("da3", q);
  res.send(`da3 ${q}`);
});

app.get("/da4/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`da4`);
    return ;
  }
  await client.emit("da4", q);
  res.send(`da4 ${q}`);
});

app.get("/da5/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`da5`);
    return ;
  }
  await client.emit("da5", q);
  res.send(`da5 ${q}`);
});

app.get("/da6/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`da6`);
    return ;
  }
  await client.emit("da6", q);
  res.send(`da6 ${q}`);
});
//dd
app.get("/dd1/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`dd1`);
    return ;
  }
  await client.emit("dd1", q);
  res.send(`dd1 ${q}`);
});

app.get("/dd2/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`dd2`);
    return ;
  }
  await client.emit("dd2", q);
  res.send(`dd2 ${q}`);
});

app.get("/dd3/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`dd3`);
    return ;
  }
  await client.emit("dd3", q);
  res.send(`dd3 ${q}`);
});

app.get("/dd4/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`dd4`);
    return ;
  }
  await client.emit("dd4", q);
  res.send(`dd4 ${q}`);
});

app.get("/dd5/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`dd5`);
    return ;
  }
  await client.emit("dd5", q);
  res.send(`dd5 ${q}`);
});

app.get("/dd6/:q", async (req, res) => {
  let q = req.params.q;
  if (q.length < 3){
    res.send(`dd6`);
    return ;
  }
  await client.emit("dd6", q);
  res.send(`dd6 ${q}`);
});

// {ฝั่ง server กระจายสัญญาณ}
io.on("connection", function(socket) {

  socket.on("ca1", async function(q) {
    await io.emit("ca1", q);
  });
  socket.on("ca2", async function(q) {
    await io.emit("ca2", q);
  });
    socket.on("ca3", async function(q) {
    await io.emit("ca3", q);
  });

//sa
  socket.on("sa1", async function(q) {
    await io.emit("sa1", q);
  });
  socket.on("sa2", async function(q) {
    await io.emit("sa2", q);
  });
    socket.on("sa3", async function(q) {
    await io.emit("sa3", q);
  });
  socket.on("sa4", async function(q) {
    await io.emit("sa4", q);
  });
	socket.on("sa5", async function(q) {
    await io.emit("sa5", q);
  });
  socket.on("sa6", async function(q) {
    await io.emit("sa6", q);
  });

  //sb
  socket.on("sb1", async function(q) {
    await io.emit("sb1", q);
  });
  socket.on("sb2", async function(q) {
    await io.emit("sb2", q);
  });
    socket.on("sb3", async function(q) {
    await io.emit("sb3", q);
  });
  socket.on("sb4", async function(q) {
    await io.emit("sb4", q);
  });
	socket.on("sb5", async function(q) {
    await io.emit("sb5", q);
  });
  socket.on("sb6", async function(q) {
    await io.emit("sb6", q);
  });

  //sc
  socket.on("sc1", async function(q) {
    await io.emit("sc1", q);
  });
  socket.on("sc2", async function(q) {
    await io.emit("sc2", q);
  });
    socket.on("sc3", async function(q) {
    await io.emit("sc3", q);
  });
  socket.on("sc4", async function(q) {
    await io.emit("sc4", q);
  });
	socket.on("sc5", async function(q) {
    await io.emit("sc5", q);
  });
  socket.on("sc6", async function(q) {
    await io.emit("sc6", q);
  });
  
  //na 
    socket.on("na1", async function(q) {
    await io.emit("na1", q);
  });
  socket.on("na2", async function(q) {
    await io.emit("na2", q);
  });
    socket.on("na3", async function(q) {
    await io.emit("na3", q);
  });
  socket.on("na4", async function(q) {
    await io.emit("na4", q);
  });
	socket.on("na5", async function(q) {
    await io.emit("na5", q);
  });
  socket.on("na6", async function(q) {
    await io.emit("na6", q);
  });
  
  //nb
    socket.on("nb1", async function(q) {
    await io.emit("nb1", q);
  });
  socket.on("nb2", async function(q) {
    await io.emit("nb2", q);
  });
    socket.on("nb3", async function(q) {
    await io.emit("nb3", q);
  });
  socket.on("nb4", async function(q) {
    await io.emit("nb4", q);
  });
	socket.on("nb5", async function(q) {
    await io.emit("nb5", q);
  });
  socket.on("nb6", async function(q) {
    await io.emit("nb6", q);
  });
  
    socket.on("a", async function(q) {
    await io.emit("a", q);
  });
    socket.on("b", async function(q) {
    await io.emit("b", q);
  });
  socket.on("c", async function(q) {
    await io.emit("c", q);
  });
  socket.on("d", async function(q) {
    await io.emit("d", q);
  });
	socket.on("f", async function(q) {
    await io.emit("f", q);
  });
  socket.on("g", async function(q) {
    await io.emit("g", q);
  });
  socket.on("h", async function(q) {
    await io.emit("h", q);
  });
  socket.on("i", async function(q) {
    await io.emit("i", q);
  });
    socket.on("j", async function(q) {
    await io.emit("j", q);
  });
    socket.on("k", async function(q) {
    await io.emit("k", q);
  });
    socket.on("l", async function(q) {
    await io.emit("l", q);
  });
  socket.on("m", async function(q) {
    await io.emit("m", q);
  });
   socket.on("n", async function(q) {
    await io.emit("n", q);
  });
     socket.on("o", async function(q) {
    await io.emit("o", q);
  });
     socket.on("p", async function(q) {
    await io.emit("p", q);
  });
     socket.on("s", async function(q) {
    await io.emit("s", q);
  });
     socket.on("t", async function(q) {
    await io.emit("t", q);
  });
     socket.on("u", async function(q) {
    await io.emit("u", q);
  });
     socket.on("v", async function(q) {
    await io.emit("v", q);
  });
     socket.on("w", async function(q) {
    await io.emit("w", q);
  });
    socket.on("x", async function(q) {
    await io.emit("x", q);
  });
      socket.on("y", async function(q) {
    await io.emit("y", q);
  });
  
  //er
   socket.on("e", async function(q) {
    await io.emit("e", q);
  });
   socket.on("r", async function(q) {
    await io.emit("r", q);
  });
    socket.on("z", async function(q) {
    await io.emit("z", q);
  });

  //rx
  socket.on("rx1", async function(q) {
    await io.emit("rx1", q);
  });
  socket.on("rx2", async function(q) {
    await io.emit("rx2", q);
  });
    socket.on("rx3", async function(q) {
    await io.emit("rx3", q);
  });
  socket.on("rx4", async function(q) {
    await io.emit("rx4", q);
  });
  socket.on("rx5", async function(q) {
    await io.emit("rx5", q);
  });
  
    //ra
  socket.on("ra1", async function(q) {
    await io.emit("ra1", q);
  });
  socket.on("ra2", async function(q) {
    await io.emit("ra2", q);
  });
    socket.on("ra3", async function(q) {
    await io.emit("ra3", q);
  });
  socket.on("ra4", async function(q) {
    await io.emit("ra4", q);
  });
  socket.on("ra5", async function(q) {
    await io.emit("ra5", q);
  });
  
    //rb
  socket.on("rb1", async function(q) {
    await io.emit("rb1", q);
  });
  socket.on("rb2", async function(q) {
    await io.emit("rb2", q);
  });
    socket.on("rb3", async function(q) {
    await io.emit("rb3", q);
  });
  socket.on("rb4", async function(q) {
    await io.emit("rb4", q);
  });
  socket.on("rb5", async function(q) {
    await io.emit("rb5", q);
  });
  
    //ga
  socket.on("ga1", async function(q) {
    await io.emit("ga1", q);
  });
  socket.on("ga2", async function(q) {
    await io.emit("ga2", q);
  });
    socket.on("ga3", async function(q) {
    await io.emit("ga3", q);
  });
  
    //ha
  socket.on("ha1", async function(q) {
    await io.emit("ha1", q);
  });
  socket.on("ha2", async function(q) {
    await io.emit("ha2", q);
  });
    socket.on("ha3", async function(q) {
    await io.emit("ha3", q);
  });
  
    //hb
  socket.on("hb1", async function(q) {
    await io.emit("hb1", q);
  });
  socket.on("hb2", async function(q) {
    await io.emit("hb2", q);
  });
    socket.on("hb3", async function(q) {
    await io.emit("hb3", q);
  });
  
//la
  socket.on("la1", async function(q) {
    await io.emit("la1", q);
  });
  socket.on("la2", async function(q) {
    await io.emit("la2", q);
  });
  
  //ps
  socket.on("ps1", async function(q) {
    await io.emit("ps1", q);
  });
  socket.on("ps2", async function(q) {
    await io.emit("ps2", q);
  });
    socket.on("ps3", async function(q) {
    await io.emit("ps3", q);
  });
  socket.on("ps4", async function(q) {
    await io.emit("ps4", q);
  });
	socket.on("ps5", async function(q) {
    await io.emit("ps5", q);
  });
  socket.on("ps6", async function(q) {
    await io.emit("ps6", q);
  });

  //pc
  socket.on("pc1", async function(q) {
    await io.emit("pc1", q);
  });
  socket.on("pc2", async function(q) {
    await io.emit("pc2", q);
  });
    socket.on("pc3", async function(q) {
    await io.emit("pc3", q);
  });
  socket.on("pc4", async function(q) {
    await io.emit("pc4", q);
  });
	socket.on("pc5", async function(q) {
    await io.emit("pc5", q);
  });
  socket.on("pc6", async function(q) {
    await io.emit("pc6", q);
  });
//da
  socket.on("da1", async function(q) {
    await io.emit("da1", q);
  });
  socket.on("da2", async function(q) {
    await io.emit("da2", q);
  });
    socket.on("da3", async function(q) {
    await io.emit("da3", q);
  });
  socket.on("da4", async function(q) {
    await io.emit("da4", q);
  });
	socket.on("da5", async function(q) {
    await io.emit("da5", q);
  });
  socket.on("da6", async function(q) {
    await io.emit("da6", q);
  });

  //dd
  socket.on("dd1", async function(q) {
    await io.emit("dd1", q);
  });
  socket.on("dd2", async function(q) {
    await io.emit("dd2", q);
  });
    socket.on("dd3", async function(q) {
    await io.emit("dd3", q);
  });
  socket.on("dd4", async function(q) {
    await io.emit("dd4", q);
  });
	socket.on("dd5", async function(q) {
    await io.emit("dd5", q);
  });
  socket.on("dd6", async function(q) {
    await io.emit("dd6", q);
  });
  
});


http.listen(port, function() {
  console.log("Power By SmartQueue (Utehn J.)");
  console.log("Queue Signal On Port:" + port);
});
