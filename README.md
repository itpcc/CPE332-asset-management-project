# CPE332-asset-management-project

## ข้อตกลง

- URL path พยายามยึด [REST API best practice](http://www.vinaysahni.com/best-practices-for-a-pragmatic-restful-api) ไว้ จะได้เหมือนๆ กัน (แต่ไม้ต้องเป๊ะก็ได้ เอาที่สะดวก)
- Model พยายามใช้ชื่อใกล้เคียงกับ controller หลัก แล้วเติม `_model` เช่น `vendors` ก็เป็น `vendor_model`
- เขียนเสร็จก็เขียน doc อธิบาย controllers และ input/output ของแต่ละ methods ด้วยเน่อ (ไม่ต้องละเอียดมาก แค่อธิบายชื่อ input output และเอาไว้ทำอัลไลก็พอ) ดูจาก [Template](docs/template.md) กะดั้ย
- Database พยายามใช้ [Query builder](https://www.codeigniter.com/user_guide/database/query_builder.html) นะ เผื่อใครจะใช้เงื่อนไขซับซ้อน (JOIN เพิ่มไรงี้) จะได้ง่าย และป้องกัน SQL injection ด้วย
- ตอน commit ให้ commit ขึ้น branch ของตัวเองก่อน ถ้า code นิ่งแล้วค่อย merge เข้า master น้า

## Helpful resource

- [Learn Git in 30 Minutes](http://tutorialzine.com/2016/06/learn-git-in-30-minutes/) 
- [GitHub For Beginners: Commit, Push And Go](http://readwrite.com/2013/10/02/github-for-beginners-part-2/)
- [CodeIgniter User Guide](https://www.codeigniter.com/user_guide/)
- [Markdown Cheat Sheet](https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet)
