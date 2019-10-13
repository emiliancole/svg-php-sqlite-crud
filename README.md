# svg-php-sqlite-crud
A CRUD interface to Sqlite3 database for svg 

- v001: Basic svg elements in sqlite tables. A table for each element.
- v002: showCoords.php added. It shows "x,y" coordinates in pixel, over a selected image.
- v003: view integer field added to all tables/elements. This is useful to select a specific integer-view where only elements with a specific view value are selected and displayed.
- v004: svg table added. This is to set "width", "height" and "viewBox" attributes in svg main tag.
- v005: circletr, ellipsetr, imagetr, recttr, texttr tables added. They have the transform attribute field for their respective tables. 
  - Deleted from menu create and delete table link for security reason, now they are available for administration only. 
  - Now only shapes set with wiew>0 are shown. The integer value "view" can be used, for each shape defined in tables, to set its visualization. 
  - Svg link to show an svg only page where view>0. 
  - Select link to show only the selected "view" values for each table.  
  - SelectView link to show only the selected single "view" value for all tables; this it is useful to show only a level of visualization. 
  - Coords link opens a new page with the selected image background (image.view=1) and shows the svg "viewBox" coordinates (x,y); this image can be changed loading a new image in the directory /image/, adding it in the image table, and setting its "view" to 1. 
  - Only image set to 1 are used as background, to use other images at their levels of visualization use imagetr.

- v006: linetr, pathtr, polygontr, polylinetr tables added. They have the transform attribute field for their respective tables.
  - help table added (Help menu link).
  
